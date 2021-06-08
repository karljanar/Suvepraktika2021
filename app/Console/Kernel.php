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
            $currentuserv = DB::select('select
            user_apps.current_version, user_apps.id, frameworks.new_framework_version,
            frameworks.framework_name
            from user_apps
            join frameworks
            on user_apps.version_scraper_id = frameworks.id');
            foreach ($currentuserv as $curr){
                if($curr->current_version != $curr->new_framework_version){
                    DB::update('update user_apps set update_available = 1 where id = ?', [$curr->id]);
                        } else {
                            DB::update('update user_apps set update_available = 0 where id = ?', [$curr->id]);
                        }
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
