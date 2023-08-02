<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\MetaApp;
 

use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;


use Netflie\WhatsAppCloudApi\Message\Media\LinkID;
use Netflie\WhatsAppCloudApi\Message\Media\MediaObjectID;

use Carbon\Carbon;

use App\Models\User;

use Response;
use App\Models\ChatRequest;

use App\Models\Chat;

class APIController extends Controller
{
    
    

    
     public function sendMessage( )
     {
        
   
  $system_api_key= env('SYSTEM_API_KEY' );
   $api_key=$_REQUEST['api_key'];
   
   
  if($api_key <> $system_api_key)
  {
      
       $ar=array();
        
        $ar['error']=true;
        $ar['message']= "API Key is incorrect";
                    
                         return Response::json($ar);
  }
  $user_id=1;
  
  
  
  
            $to_number=$_REQUEST['to_number'];
             $message=$_REQUEST['message'];
             
              $app_id=$_REQUEST['app_id'];

 
   $chat_request =ChatRequest::where("from_number",$to_number)
    ->where("app_id",$app_id)
   ->first();
 
    
   
   if(!$chat_request)
   {
        $chat_request   =   ChatRequest::create( 
                    [ 
                    'from_number' => $to_number,
                   
                     'app_id' =>$app_id,
                   
               'user_id' =>$user_id,
                    'from' =>  "API-Admin"  
                    
                     ]);
   }
        
           $chat  =   Chat::create( 
                    ['chat_requests_id' =>$chat_request->id,
                    'from_number' =>  $to_number,
                    'message' => $message ,
                     'user_id' =>$user_id,
                   ]);
        
        
  $res=    $this->send2Wapp(   $to_number, $message,$app_id);
        
        $ar=array();
        
        $ar['error']=false;
        $ar['message']= "Task submitted successfully";
                    
                         return Response::json($ar);
                             
         
     }
     
     
     
     
    function send2Wapp($to,$body,$app_id=1)
{ 
        
        
        $meta_app=MetaApp::where("id",$app_id)->first();
        
        
         $credential=[
    'from_phone_number_id' =>$meta_app->from_phone_number_id,
    'access_token' => $meta_app->access_token,
]; 


 
         
$whatsapp_cloud_api = new WhatsAppCloudApi($credential);

 
$result=$whatsapp_cloud_api->sendTextMessage('+'.$to, $body);

return $result;
    
}



     
}
