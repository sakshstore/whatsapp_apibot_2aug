<?php

use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;


use Netflie\WhatsAppCloudApi\Message\Media\LinkID;
use Netflie\WhatsAppCloudApi\Message\Media\MediaObjectID;


 use Netflie\WhatsAppCloudApi\Message\Template\Component;


use App\Models\MetaApp;



if (! function_exists('env')) {
    function env($key, $default = null) {
        // ...
    }
}


if (! function_exists('get_message_from_chatgpt')) {

  function get_message_from_chatgpt($message){
       
    
file_put_contents( __LINE__."___get_message_from_chatgpt.txt" , $message   , FILE_APPEND | LOCK_EX);

     
file_put_contents( "get_message_from_chatgpt.txt" , $message   , FILE_APPEND | LOCK_EX);


save2log( $message   , __LINE__, "get_message_from_chatgpt", "chatrequestController");
 
 $token=env('CHAT_GPT_AUTH_KEY' );
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.openai.com/v1/chat/completions',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"model": "gpt-3.5-turbo",
"messages": [{"role": "user", "content":  "'.$message.'" }],
"temperature": 0.7
}',





  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$token,
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);


file_put_contents( __LINE__."___get_message_from_chatgpt.txt" , $response   , FILE_APPEND | LOCK_EX);



save2log( $response   , __LINE__, "get_message_from_chatgpt", "chatrequestController");
 
 
 
 
file_put_contents( "chatgpt.txt",$response,  FILE_APPEND | LOCK_EX);


$res=json_decode($response);





save2log( print_r($res,true)   , __LINE__, "get_message_from_chatgpt", "chatrequestController");
 
 $mes=$res->choices[0];
 
 
$message=$res->choices[0]->message->content;





save2log( $message   , __LINE__, "get_message_from_chatgpt", "chatrequestController");
file_put_contents( "chatgpt.txt",$message, FILE_APPEND | LOCK_EX);



curl_close($curl);
return $message;

   }
   
}




if (! function_exists('save2log')) {
    
    
function save2log($data,$line,$file,$path="default")
{
    $folder="../log/".$path;
    
   // $folder="";
    $file="22222";
    $file= $line."__ __".$file.".txt";
    
    
    $file_path = $folder ."/".$file;
    
    
    if (!file_exists($folder)) {
 
 mkdir($folder, 0777, true);
}
 

    
file_put_contents( $file_path  ,"---------------". $data .PHP_EOL .PHP_EOL .PHP_EOL .PHP_EOL , FILE_APPEND | LOCK_EX);

 
    
    
}
}
   
   if (! function_exists('send2WappVideo')) {
    
       function send2WappVideo($to,$file,$app_id=1)
{ 
        
        $app_id=15;
        $meta_app=MetaApp::where("id",$app_id)->first();
        
        
         $credential=[
    'from_phone_number_id' =>$meta_app->from_phone_number_id,
    'access_token' => $meta_app->access_token,
]; 

 
         
$whatsapp_cloud_api = new WhatsAppCloudApi($credential);

 
$link_id = new LinkID($file);

  
$result=$whatsapp_cloud_api->sendVideo($to, $link_id);
return $result;

 
  
}
}
   if (! function_exists('send2WappDocument')) {
    
       function send2WappDocument($to,$file,$app_id=1)
{ 
        
        $app_id=15;
        $meta_app=MetaApp::where("id",$app_id)->first();
        
        
         $credential=[
    'from_phone_number_id' =>$meta_app->from_phone_number_id,
    'access_token' => $meta_app->access_token,
]; 


 
         
$whatsapp_cloud_api = new WhatsAppCloudApi($credential);

 
$document_name="sakshstore";
$document_caption="sakshstore"; 
$link_id = new LinkID($file);
 

$result=$whatsapp_cloud_api->sendDocument($to, $link_id);
return $result;
 
  
}
}
   
      
if (! function_exists('send2WappImage')) {
    
       function send2WappImage($to,$file,$app_id=1)
{ 
        
        $app_id=15;
        $meta_app=MetaApp::where("id",$app_id)->first();
        
        
         $credential=[
    'from_phone_number_id' =>$meta_app->from_phone_number_id,
    'access_token' => $meta_app->access_token,
]; 

 

$whatsapp_cloud_api = new WhatsAppCloudApi($credential);

 
  
  
$link_id = new LinkID($file);

$result=$whatsapp_cloud_api->sendImage('+'.$to, $link_id);

  //  $result=$whatsapp_cloud_api->sendTemplate('+'.$to, 'hello_world', 'en_US');  
 
 $whatsapp_cloud_api->sendTextMessage('+'.$to,  $file  );
 
 
 
$component_header = [];

$component_body = [
    [
        'type' => 'text',
        'text' => '*Mr Jones*',
    ],
];

$component_buttons = [
    [
        'type' => 'button',
        'sub_type' => 'quick_reply',
        'index' => 0,
        'parameters' => [
            [
                'type' => 'text',
                'text' => 'Yes',
            ]
        ]
    ],
    [
        'type' => 'button',
        'sub_type' => 'quick_reply',
        'index' => 1,
        'parameters' => [
            [
                'type' => 'text',
                'text' => 'No',
            ]
        ]
    ]
];

$components = new Component($component_header, $component_body, $component_buttons);

 $whatsapp_cloud_api->sendTemplate('+'.$to, 'sample_issue_resolution', 'en_US', $components); // Language is optional
 
 
 
return $result;
 
}
}
  
   
   
if (! function_exists('send2Wapp')) {
    
       function send2Wapp($to,$body,$app_id=1)
{ 
        
        
        $meta_app=MetaApp::where("id",$app_id)->first();
        
        
         $credential=[
    'from_phone_number_id' =>$meta_app->from_phone_number_id,
    'access_token' => $meta_app->access_token,
]; 


 
         
$whatsapp_cloud_api = new WhatsAppCloudApi($credential);

 //$result=$whatsapp_cloud_api->sendTemplate('+'.$to, 'hello_world', 'en_US');  
 

$result=$whatsapp_cloud_api->sendTextMessage('+'.$to, $body);

return $result;
    
}
}
   
   
   
   
if (! function_exists('send2WappV3')) {
    
       function send2WappV3($to,$body,$credential)
{ 
        
        
        

 
         
$whatsapp_cloud_api = new WhatsAppCloudApi($credential);

 //$result=$whatsapp_cloud_api->sendTemplate('+'.$to, 'hello_world', 'en_US');  
 

$result=$whatsapp_cloud_api->sendTextMessage('+'.$to, $body);

return $result;
    
}
}



   
if (! function_exists('get_customer_list_by_tags')) {

  function get_customer_list_by_tags()
    {
        
        

   
   
  
   $tags="tag1,tag2";
   $tag_array=explode(",",$tags);
   
   
         
           
           
           $query=" select * from chat_requests   where   ";
           
           
   $i=0;
   $query  .=" ( " ;
                foreach($tag_array as $tag)
                
                { 
                    if($i==0)
  $query=  $query . "  (  customer_tags like  '%".$tag."%' ) "  ;
  
  else
  {
      
      
  
  
  $query=  $query . " OR   (  customer_tags like  '%".$tag."%'  )"  ;
  
  }
  $i++;
  
                }
                
                
                 $query  .=" )  " ; 
            
             
            
             $chat_requests = DB::select($query);
 
        
        
      
    }
    
    
    }
    
    
    
    
   