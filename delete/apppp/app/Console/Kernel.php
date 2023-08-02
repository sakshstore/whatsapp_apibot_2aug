<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Models\Chat;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
                $schedule->command('database:backup')->daily()->sendOutputTo("database_backup.txt"); 
                
                  $schedule->call(function () {
                      
                
                $mytime = Carbon\Carbon::now();
 

Log::info($mytime->toDateTimeString() .'---This is some useful information.');



     })->everyMinute()->sendOutputTo("database_backup_Unsent.txt"); 
     
     
                    /*
                   
                           $schedule->call(function () {
          $chat = Chat::Unsent()->first();
                
                   Log::info( print_r($chat,true));
                   
                   $chat->status="Sent";
                   
                   $chat->save();
                   
        })->everyMinute()->sendOutputTo("database_backup_Unsent.txt"); 
                   
               
                       $tasks = Task::all();

  $flight = Chat::where('Status',  'New')->first();

        foreach ($tasks as $task) {

  

            $frequency = $task->frequency;

  

            $schedule->call(function() use($task) {

                

                Log::info($task->title.' '.\Carbon\Carbon::now());

            })->$frequency();

        } 
                */
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
