<?php

namespace App\Console;

use App\Models\ZoomMeeting;
use App\Http\Controllers\ZoomMeetingController;

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
        /*$schedule->command('inspire')->hourly();*/
       $zoom_meeting =  $schedule->call(function () {
        $present_date = date('Y-m-d H:i:s');
          $zoom_meeting_details = ZoomMeeting::whereDate('end_time', '<', $present_date)
                ->get()->all();

                //dd($zoom_meeting_details);
                 
                   $zoomMeeting_controller = new ZoomMeetingController; 

     

       foreach ($zoom_meeting_details as $key => $value) {

        //dd($value->meeting_id);
          
           $zoom_data =  $zoomMeeting_controller->delete($value->meeting_id);
       }
       dd($zoom_data);
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
