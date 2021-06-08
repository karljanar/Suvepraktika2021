<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

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
            $currentuserv = DB::select('select current_version, id, version_scraper_id from user_apps');
            $newframeworkv = DB::select('select id, new_framework_version from frameworks');
            foreach($currentuserv as $curver){
                //var_dump($curver->current_version);
                foreach ($newframeworkv as $newver){
                    if($curver->version_scraper_id == $newver->id){
                        if($curver->current_version != $newver->new_framework_version){
                            DB::update('update user_apps set update_available = 1 where id = ?', [$curver->id]);
                        }
                    }
                }
//            if($curver->current_version != $newframeworkv){
//                DB::up
//            }
            }


        })->everyMinute();
        // $schedule->command('inspire')->hourly();
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
