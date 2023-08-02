<?php


namespace App\Http\Controllers;

 
use App\Page;
 
use App;
use View;
use MetaTag; 

use App\ChargeCommision;
use App\Income;
use App\MemberExtra;
use App\Deposit;
use App\Gateway;
use App\Lib\GoogleAuthenticator;
use App\Transaction;
use App\Models\User;
use Config;
use App\Coins;

use App\Exchange_deposit;

use App\System_Settings;

use App\Exchange_widthdraw;
use App\Exchange_bookings;
use Illuminate\Support\Facades\DB;

 use App\Bnext_Wallet;
use App\Http\Controllers\Controller;
use Mail;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

use App\Http\Controllers\Robot\RobotInvestmentCtrl;


use App\Notifications\Login;

use App\Models\Ticket;

use Illuminate\Support\Facades\Http;


use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;


use Netflie\WhatsAppCloudApi\Message\Media\LinkID;
use Netflie\WhatsAppCloudApi\Message\Media\MediaObjectID;




class SupportCtrl extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        
    }
 public function getUser_id()
 {
     
     
 }
     
   
   
   public function  send2WappMessage()
   {
       
       $mobile="918840574997";
       
       $body="this";
       
  $res=    $this->send2Wapp(  $mobile,$body );
      
     var_dump($res); 
       
   }
     
     
      public function new_message($from,$message,$app="default")
{
    
 
    
 $this->save2log( print_r( $from,true)   , __LINE__, "reciveFB", "SupportCtrl");
    
    
    
   $ar=array();
    $ar['Error']=false; 
    
    $ar['Message']=  "successfully";

 
 
 $user=$this->get_user_id($from );
 
 
     
 $this->save2log( print_r( $user,true)   , __LINE__, "reciveFB", "SupportCtrl");
     
  $ticket=$this->getTicket_id($user,$app);
   
   
  
 $this->save2log( print_r( $ticket,true)   , __LINE__, "reciveFB", "SupportCtrl");

  $user_id= $user->id;
   $username=$user->username;
   
    
   
    $ticket_discussid = DB::table('ticket_discuss')->insertGetId(
        [ 'ticket_id' =>  $ticket->id ,
     'message' => $message, 
       'app' => $app,
     'username' =>   $username,
     'user_id' =>$user_id ]
);


 
      
 
    
    return $ar;
    
}
  
  
  
  
  
  
  
      public function add_message()
{
    
 // $body=$this->request->all();
 
// return $body['details'];
   // return print_r($body,true);
    
    
    
    
   $ar=array();
    $ar['Error']=false; 
    
    $ar['Message']=  "successfully";

 $questions=array("q1","q2","q3","q4","q5","q6","q7","q8");
 
 
//$questions=json_decode(file_get_contents("https://whatsappapi.vikkin.ltd/getquestions.php?hash=3644a684f98ea8fe223c713b77189a77"));
 
 $body=$this->request['details'];
 $number= $this->request['number'];
  $app= $this->request['app'];
 
 
 $user=$this->get_user_id($number );
 
 
     
     
  $ticket=$this->getTicket_id($user,$app);
   
   
         
         
        $admin=User::where( "email","globocoins.trade@gmail.com")->where("app",$app)->first();
  $user_id= $user->id;
   $username=$user->username;
   
   
   
   
   
   
   
    $ticket_discussid = DB::table('ticket_discuss')->insertGetId(
        [ 'ticket_id' =>  $ticket->id ,
     'message' => $body, 
       'app' => $app,
     'username' =>   $username,
     'user_id' =>$user_id ]
);


 
     
     


    $user_messages=DB::table('ticket_discuss')->where("app",$app)->where("ticket_id",$ticket->id )->where("user_id",101)->orderBy("created_at","desc")->first();

 



if($user_messages)
   {
       
     
     
      for($i=0;$i<5;$i++)
    {
        
          
          

        if($questions[$i] == $user_messages->message )
        {
            $msg=$questions[++$i];
            
           
           
            
    DB::table('ticket_discuss')->insert(
        [ 'ticket_id' =>  $ticket->id ,
     'message' => $msg , 
       'app' => $app,
     'username' =>   $admin->username,
     'user_id' => 101 ]
);
$ar['Message']= $msg;


        }
        
    }
        
        
      
   }
   else
   {
         
         


        DB::table('ticket_discuss')->insert(
        [ 'ticket_id' =>  $ticket->id ,
     'message' => $questions[0] , 
       'app' => $app,
     'username' =>   $admin->username,
     'user_id' =>101 ]
);

$ar['Message']= $questions[0];
   }
   
      
    
    return response()->json($ar);
    
}
  
  
  
  
    public function get_user_id($whatsapp)
    {
        
        if(strlen($whatsapp) < 10 ) return "";
        
        
          $user=User::where( "whatsapp",$whatsapp)->first();
 if(!$user)
        $user=User::Create(["whatsapp"=>$whatsapp,
        "name"=>$whatsapp,
          "username"=>$whatsapp,
        "email"=>$whatsapp."@gmail.com",
        "password" => $whatsapp] );
 
  return $user;
  
        
    }
    
    
    public function getTicket_id( $user,$app)
    {
        
        $number=$user->mobile;
        
        
      //  $user=User::where("mobile",$number)->first();
         
        
        
        $ticket=Ticket::where("user_id",$user->id)->where("app",$app)->first();
        
        if(!$ticket)
        {
            
            
  $user_id= $user->id;
   $username=$user->username;
   
   
   
            $id = DB::table('tickets')->insertGetId(
    ['category' =>   "Whatsapp",
    'title' =>  "Whatsapp Ticket Chat",
     'app' => $app,
       'user_id' =>$user_id,
       'username' =>$username,
       
    'details' =>   "Whatsapp Ticket Chat",] 
);   
      
        $ticket=Ticket::where("user_id",$user->id)->where("app",$app)->first();
        
        
        }
        
        return $ticket;
        
    }
      
      
      
      
      
   public function ticket_by_id($ticket_id)
{ 
    
    
    //$ticket_id=$this->request->ticket_id;
    //$user_id= Auth::user()->id;
 $data=DB::table('tickets')->where('id',$ticket_id)->orderBy('id', 'asc')->first()  ;
      
  return response()->json($data );
    
}
   
      
      
  
 public function ticket_customer_number($ticket_id)
{ 
    
    
    $user_id= Auth::user()->id;
    
    
    
 $ticket=DB::table('tickets') 
 ->where('id',$ticket_id)->first()  ;
 
 
      
  return $ticket->username;
    
}

public function add_response_message()
{
  
    $user_id= Auth::user()->id;
   $user_email= Auth::user()->email;
    $user_name= Auth::user()->name;
   $ticket_id=$this->request['ticket_id'];
   
  
   $body= $this->request['message'] ;
   
 $ticket=DB::table('tickets') 
 ->where('id',$ticket_id)->first()  ;
 
   
   $app=  $ticket->app;
   
   
    $id = DB::table('ticket_discuss')->insertGetId(
        [ 'ticket_id' => $ticket_id ,
     'message' => $body , 
     'username' =>    $user_name,
       'app' =>    $ticket->app,
     'user_id' =>$user_id ]
);

$mobile=$this-> ticket_customer_number($ticket_id);


 


$this->send2Wapp($mobile,$body);

 $ar=array();
    $ar['Error']=false; 
    
    $ar['Message']=  " successfully ".$api_call;
    
    return response()->json($ar);
    
}



public function send_file()
{
   
    $user_id= Auth::user()->id;
   $user_email= Auth::user()->email;
    $user_name= Auth::user()->name;
   $ticket_id=$this->request['ticket_id'];
   
  
   $file= $this->request['file'] ; 
    
       $image_url=$this->saveFile($file,$user_id);
       
    
  
    
   
 $ticket=DB::table('tickets') 
 ->where('id',$ticket_id)->first()  ;
 
 
 
   
   $app=  $ticket->app;
   
   
    $id = DB::table('ticket_discuss')->insertGetId(
        [ 'ticket_id' => $ticket_id ,
     'message' => $image_url, 
     'username' =>    $user_name,
       'app' =>    $ticket->app,
     'user_id' =>$user_id ]
);

$mobile=$this-> ticket_customer_number($ticket_id);



  $this->send_image_2_wapp($mobile,$image_url);
 
 $ar=array();
    $ar['Error']=false; 
    
    $ar['message']=  "Successfully ";
    $ar['image_url']=  $image_url;
    
    return response()->json($ar);
    
}





 public function ticket_list(Request $request)
{ 
  

 $data=DB::table('tickets')->orderBy('id', 'desc')->get()  ;
    
  return response()->json($data );
    
}
 public function get_messages($ticket_id)
{ 
    
    
    //$ticket_id=$this->request->ticket_id;
    
    
    
    $user_id= Auth::user()->id;
    
    
    
   
 $ticket=DB::table('tickets') 
 ->where('id',$ticket_id)->first()  ;
 
 
 $data=DB::table('ticket_discuss') 
 ->where('ticket_id',$ticket_id)->orderBy('id', 'desc')->get()  ;


 $ticket->messages=$data;
 
 
      
  return response()->json($ticket);
    
}



 public function getticket_nextmessage($ticket_id)
{ 
    
    
 
    
    
 $data=DB::table('ticket_discuss') 
 ->where('ticket_id',$ticket_id)->where('user_id',159)->orderBy('id', 'desc')->get()  ;
 
 
      
  return response()->json($data );
    
}

   
      public function close_ticket()
{
 
 
 
    
     DB::table('ticket')
            ->where('id',  $this->request['id'])
            ->update( [ 
            'status' =>  "Close"
            ]);
      
     
   
  $ar=array();
    $ar['Error']=false; 
    
    $ar['message']=  "Successfully";
    
    return response()->json($ar); 
      
}
    
    
      public function add_ticket()
{
 $user=Auth::user();
 
 
$user_id= $user->id;
   $username=$user->username;
   
   
    $id = DB::table('ticket')->insertGetId(
    ['category' =>  $this->request['category'],
    'title' =>  $this->request['title'],
    
       'user_id' =>$user_id,
       'username' =>$username,
       
    'details' =>  $this->request['details']]
);
 
 
  
    $ticket_discussid = DB::table('ticket_discuss')->insertGetId(
        [ 'ticket_id' =>  $id ,
     'message' => $this->request['details'] , 
     'username' =>    $username,
     'user_id' =>$user_id ]
);





   
  $ar=array();
    $ar['Error']=false; 
    
    $ar['Message']=  " successfully";
    
    return response()->json($ar);
    
}
     
     
     function saveFile($file,$user_id)
     {
         
         
            
       
 $output_file="uploaded/".$user_id."__".rand(2222,3333).".png";
 
 
  file_put_contents($output_file, file_get_contents($file));
  
  
 $image_url=env('APP_URL') ."/".$output_file ;
 
 



  return $image_url;
  
  
         
     }
     
     
     
function send2Wapp($to,$body)
{/*
     curl -i -X POST \
  https://graph.facebook.com/v16.0/107204178948470/messages \
  -H 'Authorization: Bearer EAAHIFF1lhZBIBANkUaD3kZC7s1t73J3KsIx9yxj1RaZAZBAObSsuSkyRwbs8bhw7K7kUKrg52utohZBXA8BmuhK057b06KAZBt5U5C99tSrVoHksxZAj4VnjVWITI0ywFQWkYKLw8xphhXCpTTB2mNCVk01g2GSxgCgPZAgnaj6ZBfjJG7YOqc7rF92b1ulorGPfUphQutfZAT71VEPQPeIaW7' \
  -H 'Content-Type: application/json' \
  -d '{ "messaging_product": "whatsapp", "to": "918840574997", "type": "template", "template": { "name": "hello_world", "language": { "code": "en_US" } } }'
  
  
  */
        
         $credential=[
    'from_phone_number_id' => '107204178948470',
    'access_token' => 'EAAHIFF1lhZBIBANkUaD3kZC7s1t73J3KsIx9yxj1RaZAZBAObSsuSkyRwbs8bhw7K7kUKrg52utohZBXA8BmuhK057b06KAZBt5U5C99tSrVoHksxZAj4VnjVWITI0ywFQWkYKLw8xphhXCpTTB2mNCVk01g2GSxgCgPZAgnaj6ZBfjJG7YOqc7rF92b1ulorGPfUphQutfZAT71VEPQPeIaW7',
]; 


   $to="918840574997";
     
     
        // $body="body";
         
$whatsapp_cloud_api = new WhatsAppCloudApi($credential);

  $result=$whatsapp_cloud_api->sendTemplate('+'.$to, 'hello_world', 'en_US'); // Language is optional
 

$result=$whatsapp_cloud_api->sendTextMessage('+'.$to, $body);
    
}
     
function send_image_2_wapp( $to,$image_url)
{
     
        $app="default";
        
   $to="918840574997";
     
 $credential=$this->getCredential($app);
 
  
         
$whatsapp_cloud_api = new WhatsAppCloudApi($credential);




$link_id = new LinkID($image_url);
$whatsapp_cloud_api->sendImage($to, $link_id);

//or

//$media_id = new MediaObjectID('<image-object-id>');
//$whatsapp_cloud_api->sendImage('<destination-phone-number>', $media_id);



}


function getCredential($app)
{
    
     
         $credential=[
    'from_phone_number_id' => '102243829431665',
    'access_token' => 'EAAHIFF1lhZBIBAAFzWieZC10QFyFp6jo7rRi1026QY2BTjGyWixPB5ogwMvfIYdPJKn52V5OFDHLlDxFtjN3EHqmZCTTpQQG6NoSOvIxLTKZBGPZBqdBTqhAxZBVNcMed1o4ZBFi09xwHYl4nStc9T3I2Rcz26TVrpMT6A9YgpFA3aduOFKblTeLHKmdfvPQNvweZC1AgFdaGZBUPnHlGZA0Ve',
]; 

return $credential;

    
}

function save2log($data,$line,$file,$path="default")
{
    $folder="../log/".$path;
    
   // $folder="";
    
    $file= $line."__ __".$file.".txt";
    
    
    $file_path = $folder ."/".$file;
    
    
    if (!file_exists($folder)) {
 
 mkdir($folder, 0777, true);
}
 

    
file_put_contents( $file_path  ,"---------------". $data  , FILE_APPEND | LOCK_EX);

 
    
    
}    
}