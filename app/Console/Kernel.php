<?php
//Kahuriga pole mõtet kärbest tappa
namespace App\Console;

use App\Models\Frameworks;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /*
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        //Checks for new version
        $schedule->call(function () {
            //Runs python web scraper
            $process = new Process(["python3", "public/python/new_version_scraper.py"]);
            $process->run();
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $result = $process->getOutput();
            $result_array = array();
            array_push($result_array, preg_split('/\s+/', $result, -1, PREG_SPLIT_NO_EMPTY));
            $frameworks = Frameworks::where('automatic_version_control', 1)->get();

            //Checks current version in database against new scraped version
            foreach ($frameworks as $framework){
                if($framework->new_framework_version != $result_array[0][($framework->id) - 1]){
                    DB::update('update frameworks set new_framework_version = ?, updated_at = ? where id = ?', [$result_array[0][($framework->id) - 1] , now(),$framework->id]);
                }
            }
        })->everyMinute();


        $schedule->call(function () {

            $current_user_app_version = DB::select('select
            user_apps.current_version, user_apps.id, user_apps.user_app_name, frameworks.framework_name, frameworks.new_framework_version,
            frameworks.framework_name
            from user_apps
            join frameworks
            on user_apps.framework_id = frameworks.id');


            $email_notifications = DB::select('select email_notifications.id, notification_enabled, users.email, users.id,
             user_apps.id as uapp_id
            from email_notifications join users on email_notifications.users_id = users.id
            join user_apps on email_notifications.user_apps_id = user_apps.id');


            $oldvdata = array();
            foreach ($current_user_app_version as $current_version){
                //If framework version doesn't match the version of user app framework version
                if($current_version->current_version != $current_version->new_framework_version){
                    DB::update('update user_apps set update_available = 1 where id = ?', [$current_version->id]);
                    foreach ($email_notifications as $emails){
                        //If user has enabled notifications
                        if($emails->uapp_id == $current_version->id && $emails->notification_enabled){
                            //Contents of email and email address
                            $email = ["email" => $emails->email];
                            $maildata = [
                                "appname" => $current_version->user_app_name,
                                "currentversion" => $current_version->current_version,
                                "newversion" => $current_version->new_framework_version,
                                "framework" => $current_version->framework_name
                            ];
                            array_push($oldvdata, $email, $maildata );
                        }

                    }
                } else {
                    DB::update('update user_apps set update_available = 0 where id = ?', [$current_version->id]);
                }
            }
            $single_email = array();
            //Removes duplicate emails and adds all duplicate email contents to single array
            for($i = 0; $i<(count($oldvdata)); $i+=2){
                if(empty($single_email[$oldvdata[$i]["email"]])) $single_email[$oldvdata[$i]["email"]] = array($oldvdata[$i+1]);
                else $single_email[$oldvdata[$i]["email"]][] = $oldvdata[$i+1];

            }

            //Gets email and email content from array and sends email to user
            for($i =0; $i<=count($single_email); $i++){
                $array_key = key($single_email);
                $appname = array();
                $currentversion = array();
                $newversion = array();
                $framework = array();

                for($x = 0; $x<count($single_email[$array_key]); $x++) {
                    array_push($appname, $single_email[$array_key][$x]["appname"]);
                    array_push($currentversion, $single_email[$array_key][$x]["currentversion"]);
                    array_push($newversion, $single_email[$array_key][$x]["newversion"]);
                    array_push($framework, $single_email[$array_key][$x]["framework"]);
                }
                $maildata = [
                    "appname" => $appname,
                    "currentversion" => $currentversion,
                    "newversion" => $newversion,
                    "framework" => $framework
                ];

                //Mail template resources/views/emails/mail.blade.php
                Mail::send('emails.mail', $maildata, function($message) use ($array_key) {
                    $message->to($array_key)
                        ->subject('Rakenduse raamistiku uuendus');
                    $message->from(config('mail.from.address'), config('mail.from.name'));
                });
                unset($single_email[$array_key]);
            }
            //When does this task run https://laravel.com/docs/8.x/scheduling
        })->everyMinute();






    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
