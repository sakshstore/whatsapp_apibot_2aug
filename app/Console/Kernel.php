<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Models\Chat;
use App\Models\MetaApp;
use App\Models\MassMessage;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

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
        
         
            
           
              
        $schedule->call(function () {
        
        
          $from = Carbon::now();
            $to = Carbon::now()->addMinute();
               
            
            
               
          //  $meta_app=MetaApp::where("id",1)->first();
            
            $seconds=60*60*24*1;
            
        $meta_app = Cache::remember('meta_app', $seconds, function () {
    return MetaApp::where("id",1)->first();
});

        
         $credential=[
    'from_phone_number_id' =>$meta_app->from_phone_number_id,
    'access_token' => $meta_app->access_token,
]; 



                        
          $chats = Chat::whereBetween('scheduled_at', [$from, $to])->get();
          
          if($chats)
          {
            foreach ($chats as $chat) { 
           
             
             
             send2WappV3($chat->to_number,$chat->message,$credential); 
             
             
             
            } 
             
          }
     
        
        
                
    
     
     
     
     
     ////
     
     
 
     
          $massMessage = MassMessage::whereBetween('scheduled_at', [$from, $to])->first();
        
        if($massMessage)
        {
        // user list
        $chats=  get_customer_list_by_tags($massMessage->customer_tags) ;
        
        

        foreach($chat_requests as $request){
            
            $random="message_v".rand(1,5);
            
            $message=$request->$random;
            $to =$request->from_number;
           
             send2WappV3($to,$message,$credential); 
        
             
        }
        }
        
        
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
