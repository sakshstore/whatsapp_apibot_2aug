<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;


use App\Http\Controllers;


use App\Models\Webhook;


class WebhookController extends Controller
{
    //
    
    
      private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        
    }
    
  
  
    
     
          public function receive_fbwebhook ()
{
    
    
            $data = $this->request->all();
     
// $web_hook=new Webhook();
// $web_hook->data=$data;

// $web_hook->save();



  Webhook::create(   ['data' =>json_encode($data) ]);
   
 
  
 
 if(isset($_GET['hub_challenge'])) return  $_GET['hub_challenge']; 
  
    $this->capture_webhook_data_for_report($data );
  
 save2log( print_r( $data,true)   , __LINE__, "reciveFB", "WebhookController");

$this->processJson($data,"default");


 
  
 
  event(new WebhookReceived('Webhook Received')) ;
  
  $ar=array();
    $ar['Error']=false; 
    
    $ar['message']=  "Successfully";
    
    return response()->json($ar); 
      
}




   
public function processJson($object,$app)
 {
     $ar=array();
     
     
     
file_put_contents( __LINE__."__processJson.txt" ,  print_r( $object,true)   , FILE_APPEND | LOCK_EX);

//new_message  from_number

 
   $ar['name']=$object['entry'][0]['changes'][0]['value']['contacts'][0]['profile']['name'];
       
 $ar['wa_id']=  $object['entry'][0]['changes'][0]['value']['contacts'][0]['wa_id'];
       
 
 
 
 
$ar['from_number']=   $object['entry'][0]['changes'][0]['value']['messages'][0]['from'];
       
$ar['message']=   $object['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
       
       
       
      
       
       
$ar['display_phone_number']=     $object['entry'][0]['changes'][0]['value']['metadata']['display_phone_number'];
         
 $ar['phone_number_id']=     $object['entry'][0]['changes'][0]['value']['metadata']['phone_number_id'];
       
       
       
 save2log( print_r($ar,true)  , __LINE__, "reciveFB", "WebhookController");
     
   
       
 save2log( print_r( $object,true)   , __LINE__, "reciveFB", "WebhookController");
     
   
   
   
   $chat_request=new ChatRequestController();
   
   
    
 save2log( print_r( $ar,true)   , __LINE__, "reciveFB", "WebhookController");
 
 
 
     
file_put_contents( __LINE__."__save_log.txt" ,  print_r( $ar,true)   , FILE_APPEND | LOCK_EX);


$display_phone_number=$ar['display_phone_number'];


   if($display_phone_number=="919559190379")
   {
       
file_put_contents( __LINE__."__save_log.txt" ,  print_r( $ar,true)   , FILE_APPEND | LOCK_EX);

$st=   $chat_request->replay_message($ar,"default");

}
   
   else
  {
      
 
   
file_put_contents( __LINE__."__save_log.txt" ,  print_r( $ar,true)   , FILE_APPEND | LOCK_EX);
   $st=   $chat_request->new_message($ar,"default");
   
 }
   
   
file_put_contents( __LINE__."__save_log.txt" ,  print_r( $ar,true)   , FILE_APPEND | LOCK_EX);


       
 save2log( print_r( $st,true)   , __LINE__, "reciveFB", "WebhookController");
      
 
 }



 

  public function test()
     {
       
         $sc=new SupportCtrl($this->request);
         
         
     $image_url="https://static.javatpoint.com/tutorial/laravel/images/laravel-file-upload.png";
 
 
$mobile="";
   $st= $sc-> send_image_2_wapp( $mobile,$image_url);
 
 
 var_dump($st);
 
          return "";
          
          
         $credential=[
    'from_phone_number_id' => '102243829431665',
    'access_token' => 'EAAHIFF1lhZBIBANkUaD3kZC7s1t73J3KsIx9yxj1RaZAZBAObSsuSkyRwbs8bhw7K7kUKrg52utohZBXA8BmuhK057b06KAZBt5U5C99tSrVoHksxZAj4VnjVWITI0ywFQWkYKLw8xphhXCpTTB2mNCVk01g2GSxgCgPZAgnaj6ZBfjJG7YOqc7rF92b1ulorGPfUphQutfZAT71VEPQPeIaW7',
]; 


   $to="918840574997";
     
     
         $body="body";
         
$whatsapp_cloud_api = new WhatsAppCloudApi($credential);

  $result=$whatsapp_cloud_api->sendTemplate('+'.$to, 'hello_world', 'en_US'); // Language is optional
 

$result=$whatsapp_cloud_api->sendTextMessage('+'.$to, $body);
 return "";
 
 
 
// save2log( $result    , __LINE__, "Metafunction");
 
 
 
 
        
         
         
            $support_ctrl=new SupportCtrl( $this->request);
   
   $st=$support_ctrl->send2Wapp($from,$body);
   
   
   
   return "";
       
         
         $data=array();
         $data["messaging_product"]="whatsapp";
         $data["to"]="918840574997";
       $data["type"]="template";
     $data["template"]["name"]="hello_world";
     $data["template"]["language"]["code"] ="en_US";
   $response = Http::whatsapp()->post("102243829431665/messages",$data);
     $res= $response->body();
     
     $r=json_decode($res);
     
     
     
     var_dump($response->body());
     
     return "";
     
         
       
   
       
 save2log( print_r( $st,true)   , __LINE__, "reciveFB", "WebhookController");
         
     }
























function capture_webhook_data_for_report($data )
{
 
    
 
  $file_path="../storage/webhook/". date("Y-m-d-h" )."webhook.txt";
     
    
    
file_put_contents( $file_path ,  print_r( $data,true)   , FILE_APPEND | LOCK_EX);

 
    
    
}


 




}
