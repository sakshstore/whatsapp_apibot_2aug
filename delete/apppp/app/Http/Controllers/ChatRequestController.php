<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequestRequest;
use App\Http\Requests\UpdateChatRequestRequest;
use App\Models\ChatRequest;

use App\Models\Chat;
use Response;


use App\Models\MetaApp;

use Illuminate\Http\Request; 

use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;


use Netflie\WhatsAppCloudApi\Message\Media\LinkID;
use Netflie\WhatsAppCloudApi\Message\Media\MediaObjectID;

use Carbon\Carbon;

use App\Models\User;

use Illuminate\Support\Facades\Auth;


 
class ChatRequestController extends Controller
{
    
        public function test(Request $request)
    {
        echo "<pre>";
        
        
    $chat=   Chat::where('scheduled_at', '<', Carbon::now()->subMinutes(2222)->toDateTimeString())->take(2)->get();
        
              var_dump(  $chat);
              
              exit();
                $currentDateTime = Carbon::now();

        $newDateTime = Carbon::now()->addMinute(60);

             
 
        
        $chat = Chat::Unsent()->ReadyToSend()->first();
          
           var_dump(  $chat);
           
                var_dump( Carbon::now()->subMinutes(12));
                
    }
    
    
      public function __construct()
    {
      $this->middleware('auth');
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
      
      if ($request->has('app_id') &&  $request->has('from_number')  ) {
    
        $app_id=$request->app_id;
         $from_number=$request->from_number;
        
     $chat_requests_row =ChatRequest::where("from_number",$from_number)->where("app_id",$app_id)->first();
    
    
     $app =MetaApp::where("id",$app_id)->first();
     
     
}
else   if ($request->has('app_id')   ) {
    
        $app_id=$request->app_id;
         
        
     $chat_requests_row =ChatRequest::where("app_id",$app_id)->first();
    
   
     $app =MetaApp::where("id",$app_id)->first();
     
       

}
 
  else  
 
    {
    
       $chat_requests_row =ChatRequest::latest()->first();
   
    
     $app =MetaApp::where("id",$chat_requests_row->app_id)->first();
    
     
  $app_id=$app->id; 
     
}

 
  
   if($chat_requests_row)
    {
       $chat_requests_id=  $chat_requests_row->id;
     $from_number=   $chat_requests_row->from_number;  
        
    }
    else
    {
         $chat_requests_id=  "";
     $from_number=  "";  
        
        
    }

    
    
      $chat_requests = ChatRequest::orderBy('created_at',"desc")
               ->take(1000)
               ->get();
               
                $meta_app_id=array();
             foreach($chat_requests as $chat_request)
             {
                 
                $meta_app_id[]=$chat_request->app_id;
             }
             
             
             $meta_apps=  MetaApp::whereIn('id',$meta_app_id)->get();  // select only which are in chat requests not all
             
         
             
        return view('dashboard',compact( 'chat_requests','from_number' ,'chat_requests_id','meta_apps','app','chat_requests_row'));
        
         
           
           
    } 
    
    
    public function index(Request $request)
    {
      $chat_requests=  ChatRequest::where("app_id",$request->app_id)
      ->where("status",$request->status)
            ->orderBy('id' )
               ->take(1000)
               ->get();
      
      
           return Response::json($chat_requests);
           
           
    }   
    public function chat_messages(Request $request)
    { 
    
       $from_number=$request->from_number;
       $app_id=$request->app_id;
       
    
   $chat_requests_row =ChatRequest::where("from_number",$from_number)
   ->where("app_id",$app_id) ->first();
   
     $chat_requests_id=  $chat_requests_row->id;
     
     
        $status=$request->status;
        
        
     if($status=="")
     
      $chats=  Chat::where("chat_requests_id",$chat_requests_id) ->orderBy('created_at')->get();
      else
      
      $chats=  Chat::where("chat_requests_id",$chat_requests_id) ->where("status",$status)->orderBy('created_at')->get();
      
      $chat_array=array();
      
      foreach($chats as $chat)
      {
    $chat->timeago=$chat-> created_at->diffForHumans(); 
    
          array_push($chat_array,$chat);
    
      }
      
           return Response::json($chats);
           
           
    }

     
     
   
      public function update_chat_request_status(Request $request)
    { 
    
       $from_number=$request->from_number;
       $status=$request->status;
       
      
       
       $app_id=$request->app_id;
    
   $chat_requests_row =ChatRequest::where("from_number",$from_number)->where("app_id",$app_id)->first();
   
        $chat_requests_row ->status=    $status;
        
           $chat_requests_row->save();
           
          $ar=array();
        
        $ar['error']=false;
        $ar['message']= "Task completed successfully";
                    
                         return Response::json($ar);  
    }
 public function create_customer_tags(Request $request)
    { 
        
        
       $chat_requests_id=$request->chat_requests_id;
       
       
       $customer_tags=$request->tags;
        
    
       $chat_requests_row =ChatRequest::where("id",$chat_requests_id) ->first();
   
   
   
    $tags=array();
  $tags_array=json_decode($request->tags);
 foreach ($tags_array as $tag_element) {
 	array_push($tags,$tag_element->value);
}

$customer_tags=implode(",",$tags);







        $chat_requests_row ->customer_tags=    $customer_tags;
        
           $chat_requests_row->save();
             
          $ar=array();
        
        $ar['error']=false;
        $ar['message']= "Task completed successfully";
                    
        return Response::json($ar);  
    }
     
    public function create_customer_note(Request $request)
    { 
        
        
       $chat_requests_id=$request->chat_requests_id;
       
       
       $customer_note=$request->customer_note;
        
    
       $chat_requests_row =ChatRequest::where("id",$chat_requests_id) ->first();
   
   
        $chat_requests_row ->customer_note=    $customer_note;
        
           $chat_requests_row->save();
             
          $ar=array();
        
        $ar['error']=false;
        $ar['message']= "Task completed successfully";
                    
        return Response::json($ar);  
    }
    
    
    
      public function set_fav_unfav(Request $request)
    { 
    
       $chat_id=$request->chat_id;
       $status=$request->status;
       
      
       
       
    
   $chat  =Chat::where("id",$chat_id) ->first();
   
        $chat ->status=    $status;
        
           $chat->save();
           
          $ar=array();
        
        $ar['error']=false; $ar['status']=$status;
        $ar['message']= "Task completed successfully";
                    
                         return Response::json($ar);  
    }
    
    
    
    
    
    
    
    
    
    
     public function new_message($ar ,$app)
     {
        
        
 
         
         $name=$ar['name'];
         $wa_id=$ar['wa_id'];
         $from_number=$ar['from_number'];
         $message=$ar['message'];
         $display_phone_number=$ar['display_phone_number'];
         $phone_number_id=$ar['phone_number_id']; 
          
         
         
file_put_contents( "new_message.txt" , print_r($ar,true) , FILE_APPEND | LOCK_EX);


    //todo determine the app id and then use 
    
   $chat_request =ChatRequest::where("from_number",$from_number)
   ->where("display_phone_number",$display_phone_number)
   ->where("phone_number_id",$phone_number_id)
   ->first();
 
   
   $app_id=1;
   
   if(!$chat_request)
   {
        $chat_request   =   ChatRequest::create( 
                    ['name' =>$name,
                    'from_number' =>$from_number,
                    'display_phone_number' =>$display_phone_number,
                    'phone_number_id' =>$phone_number_id,
                     'app_id' =>$app_id,
                    'status' =>  "New",
                    'category' =>  "Customer",
                    'from' =>  "Whatsapp", 
                    'url' =>  "localhost",
                    'referral' =>  "Whatsapp Messages" ]);
   }
        
           $chat  =   Chat::create( 
                    ['chat_requests_id' =>$chat_request->id,
                    'from_number' => $from_number,
                    'message' => $message ,
                     'user_id' =>  200 
                   ]);
        
        
  $res=    $this->send2Wapp(  $from_number, "Message received",$app_id);
        
        $ar=array();
        
        $ar['error']=false;
        $ar['message']= "task completed successfully";
                    
                         return Response::json($ar);
                             
         
     }
   
      
   public function get_message_from_chatgpt($message){
       
    
file_put_contents( __LINE__."___get_message_from_chatgpt.txt" , $message   , FILE_APPEND | LOCK_EX);

     
file_put_contents( "get_message_from_chatgpt.txt" , $message   , FILE_APPEND | LOCK_EX);

 $this->save2log( $message   , __LINE__, "get_message_from_chatgpt", "chatrequestController");
 
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


 $this->save2log( $response   , __LINE__, "get_message_from_chatgpt", "chatrequestController");
 
 
 
 
file_put_contents( "chatgpt.txt",$response,  FILE_APPEND | LOCK_EX);


$res=json_decode($response);




 $this->save2log( print_r($res,true)   , __LINE__, "get_message_from_chatgpt", "chatrequestController");
 
 $mes=$res->choices[0];
 
 
$message=$res->choices[0]->message->content;




 $this->save2log( $message   , __LINE__, "get_message_from_chatgpt", "chatrequestController");
file_put_contents( "chatgpt.txt",$message, FILE_APPEND | LOCK_EX);



curl_close($curl);
return $message;

   }
   
   
     public function replay_message($ar ,$app)
     {
        
        
  

  
    //todo determine the app id and then use 
    
   $chat_request =ChatRequest::where("from_number",$ar['from'])
   ->where("display_phone_number",$ar['display_phone_number'])
   ->where("phone_number_id",$ar['phone_number_id'])
   ->first();
 
   
   $app_id=1;
   
   if(!$chat_request)
   {
        $chat_request   =   ChatRequest::create( 
                    ['name' =>$ar['name'],
                    'from_number' =>$ar['from'],
                    'display_phone_number' =>$ar['display_phone_number'],
                    'phone_number_id' =>$ar['phone_number_id'],
                     'app_id' =>$app_id,
                    'status' =>  "New",
                    'category' =>  "Customer",
                    'from' =>  "Whatsapp", 
                    'url' =>  "localhost",
                    'referral' =>  "Whatsapp Messages" ]);
   }
        
           $chat  =   Chat::create( 
                    ['chat_requests_id' =>$chat_request->id,
                    'from_number' => $ar['from'],
                    'message' => $ar['body'] ,
                     'user_id' =>  200 
                   ]);
        
        
        
        
//file_put_contents( __LINE__."__save_replay_message_log.txt" ,  print_r( $chat_request,true)   , FILE_APPEND | LOCK_EX);


        
 //$res=    $this->send2Wapp(  $ar['from'],"thanks",$app_id);
 
 
 
//file_put_contents( __LINE__."__save_replay_message_log.txt" ,  print_r( $res,true)   , FILE_APPEND | LOCK_EX);


$message= $ar['body'] ;
     
 // $res=    $this->send2Wapp(  $ar['from'],$message,$app_id);
 
  
  $message=$this->get_message_from_chatgpt($message);
        
        
        
        
//file_put_contents( __LINE__."__save_replay_message_log.txt" , $message   , FILE_APPEND | LOCK_EX);


//file_put_contents( __LINE__."__save_replay_message_log.txt" , $message   , FILE_APPEND | LOCK_EX);







         $chat  =   Chat::create( 
                    ['chat_requests_id' =>$chat_request->id,
                    'from_number' => $ar['from'],
                    'message' => $message ,
                     'user_id' =>  200 
                   ]);



        
//file_put_contents( __LINE__."__save_replay_message_log.txt" , print_r($chat,true)   , FILE_APPEND | LOCK_EX);





 //$this->save2log( $message   , __LINE__, "get_message_from_chatgpt", "chatrequestController");
 
 
 $res=    $this->send2Wapp(  $ar['from'],$message,$app_id);
        
        
      
//file_put_contents( __LINE__."__save_replay_message_log.txt" , print_r($res,true)   , FILE_APPEND | LOCK_EX);



        
        
        $ar=array();
        
        $ar['error']=false;
        $ar['message']= "Task completed successfully";
                    
                         return Response::json($ar);
                             
         
     }
   

    public function create_chat_message(StoreChatRequestRequest $request)
    {
        
      
        
       
       $user_id=Auth::user()->id;
       
       
        $chat  =   Chat::create( 
                    ['chat_requests_id' =>$request->chat_requests_id,
                       'type' =>  "Instant" ,
                    'from_number' =>  "admin-".$user_id ,
                    'message' => $request->message ,
                     'user_id' => $user_id 
                   ]);
        
        
            $app_id=$request->app_id;
            
            
   $chat_requests_row =ChatRequest::where("id",$request->chat_requests_id)->where("app_id",$app_id)->first();
   
      
        
   $mobile=$chat_requests_row->from_number;
        $body=$request->message;
       
  $res=    $this->send2Wapp(  $mobile,$body,$app_id );
  
  
  
        $ar=array();
        
        $ar['error']=false;
       $ar['mobile']=  $mobile;
         $ar['body']=  $body;
       $ar['message']="Request was submitted successfully";//  print_r($res,true);
   
   return Response::json($ar);
                         
                         
                         
    }
     



    public function create_chat_message_scheduled(StoreChatRequestRequest $request)
    {
        
      
        
       
       $user_id=Auth::user()->id;
       
       
        $chat  =   Chat::create( 
                    ['chat_requests_id' =>$request->chat_requests_id,
                             'type' =>  "Scheduled" ,
                    'from_number' =>  "admin-".$user_id ,
                    'message' => $request->message ,   
                    'scheduled_at' =>Carbon::parse(  $request->scheduled_at) ,
                     'user_id' => $user_id 
                   ]);
        
        
     
 
  
        $ar=array();
        
        $ar['error']=false;
      
       $ar['message']="Request was submitted successfully";//  print_r($res,true);
   
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

 //$result=$whatsapp_cloud_api->sendTemplate('+'.$to, 'hello_world', 'en_US');  
 

$result=$whatsapp_cloud_api->sendTextMessage('+'.$to, $body);

return $result;
    
}




function search_result_click_redirect(Request $request,ChatRequest $chat_request,Chat $chat){
    
 
 

return  redirect()->route('dashboard', ['from_number' => $chat_request->from_number, 'app_id' => $chat_request->app_id,'chat' =>$chat->id  ]);


     

}






function search_in_message(Request $request){
    
    $search_query=$request->search_query;
    
   
                   
    
    $chats = Chat::where('message','LIKE',"%{$search_query}%")->get();
    
    
    
    
        return view('search_results',compact( 'chats' ));
        
        
        
        
    
}



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
