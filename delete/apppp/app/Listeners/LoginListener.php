<?php

namespace App\Listeners;


use Illuminate\Auth\Events\Login;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


use App\Notifications\LoginNotifications; 

 use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Notification;
use App\Models\LoginHistory;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Validated  $event
     * @return void
     */
    public function handle(Login $event  )
    {
         
         $user=Auth::User();
       
       $ip=\Request::ip();
       
       
   
        
        $login_history=new LoginHistory();
        
       $login_history->user_id = $user->id;
        $login_history->ip = $ip;
        $login_history->save();
        
        
        
        
       Notification::send($user, new LoginNotifications($user ));
       
         
    }
}
