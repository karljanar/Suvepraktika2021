<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $currentuserv = DB::select('select
            user_apps.current_version, user_apps.id, frameworks.new_framework_version,
            frameworks.framework_name
            from user_apps
            join frameworks
            on user_apps.version_scraper_id = frameworks.id');

            //Table not filling by default, so theres need for second query
            $emailnot = DB::select('select email_notifications.id, notification_enabled, users.email, users.id, user_apps.id as uapp_id
            from email_notifications join users on email_notifications.users_id = users.id
            join user_apps on email_notifications.user_apps_id = user_apps.id');

            foreach ($currentuserv as $curr){
                if($curr->current_version != $curr->new_framework_version){
                    DB::update('update user_apps set update_available = 1 where id = ?', [$curr->id]);
                    foreach ($emailnot as $emails){
                        if($emails->uapp_id == $curr->id && $emails->notification_enabled){
                            $email = $emails->email;
                            var_dump($email);
                            $maildata = [
                                "app" => 'Rakenduse raamistikule on ilmunud uuendus'
                            ];
                            Mail::send('emails.mail', $maildata, function($message) use ($email) {
                                $message->to($email)
                                    ->subject('Rakenduse raamistiku uuendus');
                                $message->from('t6naktests@gmail.com', 'Padjaklubl');
                            });
                        }
                    }


                } else {
                    DB::update('update user_apps set update_available = 0 where id = ?', [$curr->id]);
                }
            }
        })->everyFifteenMinutes();
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
