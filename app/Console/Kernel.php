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
            $reservations = DB::table('reservations')->get();

            foreach($reservations as $reservation){

                $reservation_days = DB::table('reservation_days')->where('reservation_id',$reservation->id)->get();

                foreach($reservation_days as $reservation_day){

                    if($reservation_day->pickup_date = date("Y-m-d") && $reservation->status_id == 1){
                        $reservation->status_id = 4;
                        $reservation->save();
                        break;
                    }
                }
            }
        })->daily();
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
