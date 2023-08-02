<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\LoginHistory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

 use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\OTP;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Mail;
use App\Notifications\ChangePasswordNotifications; 

use App\Mail\SakshMail;
 


class AuthController extends Controller
{
    //
       public function home()
    {


 

$login_histories = LoginHistory::where("user_id",Auth::user()->id)->latest()->take(5)->get();
          
 
        return view('user.home', compact('login_histories'));
    }
    
     public function login_history()
    {


 

$login_histories = LoginHistory::where("user_id",Auth::user()->id)->latest()->take(50)->get();
          
 
        return view('user.login_history', compact('login_histories'));
    }
       
 
 



    
    
    
    
    
     
    
    
    
     
    
    private function verify_recaptha(Request $request)
    {
        
                $data = array(
            'secret'   => env('GOOGLE_RECAPTCHA_SECRET'),
            'response' => $request->grecaptcha_token
        );

$res=false;

        
            $verify = curl_init();
            curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($verify, CURLOPT_POST, true);
            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($verify);
         $res= json_decode($response)->success;
       
        return $res;
    }
    
    
     public function verify_login_with_otp(Request $request)
    {
         
    
   
    
             
  $recaptcha=$this->verify_recaptha(  $request);
         
          
   if(!$recaptcha)
   
  return redirect()->back() ->with('error','Recaptcha Error plz try again after some time. ');
        
        
      $email=$request->email;
   $otp=$request->otp;
        
        
   $user=User::where("email",$email)->first();
  // var_dump($user->id);
   
   
   
   if(!$user)
   
  return redirect()->back() ->with('error','No user registed with this email ');
    
    
    
   if(!$this->verify_otp($user->id,$otp,"Login"))
   
    return redirect()->back() ->with('error','Incorrect OTP ');
    
   // login now 

      Auth::login($user);

            return redirect('/home');
            
            
    //return redirect()->back() ->with('success','Login success ');
    
    }
    
    
    
    public function login_with_otp(Request $request)
    {
         
  $recaptcha=$this->verify_recaptha(  $request);
         
          
   if(!$recaptcha)
   
  return redirect()->back() ->with('error','Recaptcha Error plz try again after some time. ');
    
  
    
    
   $email=$request->email;
   
   $user=User::where("email",$email)->first();
   
   
   
   if(!$user)
   
     
  return redirect()->back() ->with('error','No user registed with this email ');
    
    
      
        
        
  
   
  $otp= $this->send_otp($user,"Login");
    
  
  return view('auth.verify_otp_for_login',compact('email')) ;

    
    
    }
    
    
    function verify_otp($user_id,$otp,$purpose)
    {
        
        $otp=OTP::where("user_id",$user_id)->where("code",$otp)->where("purpose",$purpose)->first();
        
        if($otp)
        return true;
        else
        return false;
        
        
        
    }
    function send_otp($user,$purpose){
      
        $otp=new OTP(); 
      
      $code=223322;
      
        $otp->code=223322;//$code;
        
        
        $otp->user_id=$user->id;
        
        
         $otp->purpose=$purpose;
        $otp->save(); 
        
        $message="OTP for the login is ".$code;
        
                Mail::to($user)->send(new SakshMail($message));
                
                
        
        
    }
    
}
