<?php

namespace App\Console;

use App\Jobs\GetCoulombData;
use File;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        $seconds = 5;

        if (File::exists(app()->storagePath().'/app/session'))
        {
            $session_id = File::get(app()->storagePath().'/app/session');

            $schedule->call(function () use ($seconds, $session_id) {

                $dt = \Carbon\Carbon::now();

                $x=60/$seconds;

                do{

                    GetCoulombData::dispatchNow($session_id);

                    time_sleep_until($dt->addSeconds($seconds)->timestamp);

                } while($x-- > 0);

            })->everyMinute();
        }

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
