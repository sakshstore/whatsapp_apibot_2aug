<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jackiedo\DotenvEditor\Facades\DotenvEditor;

use App\Models\Settings;



use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class SettingsController extends Controller
{
    //
    
    
    public function __construct()
{
     $this->middleware(['role:Super Admin' ]);
}


    
      public function get_settings()
    {
        
        $settings= new Settings();
        
        
        $settings->app_name=DotenvEditor::getValue('APP_NAME'); 
        $settings->app_logo=DotenvEditor::getValue('APP_LOGO'); 
        $settings->app_url=DotenvEditor::getValue('APP_URL');  
        
        
        $settings->host=DotenvEditor::getValue('MAIL_HOST'); 
        $settings->port=DotenvEditor::getValue('MAIL_PORT'); 
        $settings->username=DotenvEditor::getValue('MAIL_USERNAME'); 
        $settings->password=DotenvEditor::getValue('MAIL_PASSWORD'); 
        
        
        
        
        
        $settings->encryption=DotenvEditor::getValue('MAIL_ENCRYPTION'); 
        $settings->from_address=DotenvEditor::getValue('MAIL_FROM_ADDRESS'); 
        $settings->from_name=DotenvEditor::getValue('MAIL_FROM_NAME'); 
        
        
     $settings->api_key=DotenvEditor::getValue('SYSTEM_API_KEY'); 
        
        
     $settings->chat_gpt_auth_key=DotenvEditor::getValue('CHAT_GPT_AUTH_KEY'); 
        
        
     $settings->pusher_app_id=DotenvEditor::getValue('PUSHER_APP_ID'); 
        
     $settings->pusher_app_key=DotenvEditor::getValue('PUSHER_APP_KEY'); 
        
     $settings->pusher_app_secret=DotenvEditor::getValue('PUSHER_APP_SECRET'); 
        
     $settings->pusher_app_cluster=DotenvEditor::getValue('PUSHER_APP_CLUSTER'); 
        
        
        
        
           $settings->recaptcha_key=DotenvEditor::getValue('GOOGLE_RECAPTCHA_KEY'); 
        $settings->recaptcha_secret=DotenvEditor::getValue('GOOGLE_RECAPTCHA_SECRET'); 
        
        
        
        //$keys = DotenvEditor::getKeys();
         
 return view('settings.form',compact('settings'));
   
   
     
        
    }
    
          
      public function settings_logo(Request $request)
    {
        
  
     
         $app_logo = $request->file('file');
         
         
      $imagefileName  = time().'__'.$app_logo->getClientOriginalName();
      
      
   $app_logo_url = $app_logo->storeAs('logo', $imagefileName, 'public');
            
$host=DotenvEditor::getValue('APP_URL'); 

  
           $editor = DotenvEditor::setKeys([
    
    'APP_LOGO' =>$host."/storage/". $app_logo_url  
    
    
]);
     

$editor->save();

return "Uploaded succesfully";


    }
    
        
      public function settings_branding(Request $request)
    {
        
        


           $editor = DotenvEditor::setKeys([
     'APP_NAME' =>  $request->app_name,
   
       'APP_URL' =>  $request->app_url
    
    
]);
     

$editor->save();
        
     return redirect()->back() ->with('success', 'Updated successfully.');  
        
        
    }
    
    
    
    public function settings_recaptcha(Request $request)
    {
        
        
        $editor = DotenvEditor::setKeys([
    'GOOGLE_RECAPTCHA_KEY' =>  $request->recaptcha_key,
    'GOOGLE_RECAPTCHA_SECRET' => $request->recaptcha_secret 
    
    
]);

    $editor->save();
        
        
        return redirect()->back()
            ->with('success', 'Updated successfully.');  
        
        
    }
    
    
    
     public function settings_chat_gpt_auth_key(Request $request)
    {
        
        


           $editor = DotenvEditor::setKeys([
     'CHAT_GPT_AUTH_KEY' =>  $request->chat_gpt_auth_key 
    
]);
     

$editor->save();
        
     return redirect()->back() ->with('success', 'Updated successfully.');  
        
        
    }
    
    
    
    
    
    
    public function settings_notifications(Request $request)
    {
        
        $editor = DotenvEditor::setKeys([
    'MAIL_HOST' =>  $request->host,
    'MAIL_PORT' => $request->port,
    'MAIL_USERNAME' => $request->username,
    'MAIL_PASSWORD' => $request->password,
    'MAIL_ENCRYPTION' => $request->encryption,
    'MAIL_FROM_ADDRESS' => $request->from_address,
    
    'MAIL_FROM_NAME' =>$request->from_name,
    
    
]);
          $editor->save();
        
        
        return redirect()->back()
            ->with('success', 'Updated successfully.');
            
        
    }
   
    
    public function settings_api_key(Request $request)
    {
        $api_key= rand(10000,90000)."-".rand(10000,90000)."-".rand(10000,90000)."-".rand(10000,90000) ;
        
        
        $editor = DotenvEditor::setKeys([
    'SYSTEM_API_KEY' =>  $api_key
    
    
]);
          $editor->save();
        
        
        return redirect()->back()
            ->with('success', 'Updated successfully.');
            
        
    }
   
    
        
    public function settings_pusher(Request $request)
    {
      


      $editor = DotenvEditor::setKeys([
    'PUSHER_APP_ID' =>  $request->pusher_app_id,
    'PUSHER_APP_KEY' => $request->pusher_app_key,
    'PUSHER_APP_SECRET' => $request->pusher_app_secret,
    'PUSHER_APP_CLUSTER' => $request->pusher_app_cluster 
    
    
]);
          $editor->save();
        
        
        return redirect()->back()
            ->with('success', 'Updated successfully.');
            
            
    }
        
        
        
}
