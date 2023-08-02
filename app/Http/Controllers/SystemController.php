<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

  
use Response; 

use Illuminate\Support\Facades\DB;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\ChatRequest;

use App\Models\Chat;


class SystemController extends Controller
{
    //
    
    
    
    
    
    public function home()
    {
        
        
    
    
$messages_count_data =Chat::selectRaw("COUNT(*) messages_count, DATE_FORMAT(created_at, '%Y %m %e') date")
    ->groupBy('date')
    ->get();
 
    
    
    
    
$chat_requests_count_data =ChatRequest::selectRaw("COUNT(*) from_number ,app_id  ")
    ->groupBy('app_id')
    ->get();
 

   
  
    
  return view('home',compact('messages_count_data','chat_requests_count_data'));
  
  
    }
    
    
    public function getnotifications(Request $request)
    {
        
        
      $user = Auth::User();
      
 $unread_notifications=   array();
 $notifications=   array();

    foreach($user->unreadNotifications  as $notification) 
                 
          {       
              
              array_push ($unread_notifications ,  $notification  );
      
                   $notification->markAsRead();
                 
                 
          }
          
          


 foreach($user->notifications   as $notification) 
    array_push ($notifications ,  $notification  );
       
                 
                 
           
  return view('notifications',compact('unread_notifications', 'notifications'));
        
           
    }   
    
    
}
