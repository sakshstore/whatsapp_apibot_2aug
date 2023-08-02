<?php

use Illuminate\Support\Facades\Route;
 
 

 use App\Http\Controllers\ChatRequestController; 
 
 
 use App\Http\Controllers\MetaAppController;
 use App\Http\Controllers\AuthController;
  
 
 use App\Http\Controllers\SystemController;
 
 use App\Http\Controllers\WebhookController;
 
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 
 
 
Route::get('create_roles_permission', [UserController::class, 'create_roles_permission']   )->name('create_roles_permission'); 



Route::get('testEvent', [WebhookController::class, 'testEvent']   )->name('testEvent'); 




Route::get('/', function () {
    return redirect('/login');
});

 

Route::middleware(['auth' ])->group(function () {
    
 
    
    Route::resource('users',UserController::class)  ;
    
    
    
 
//Route::get('/home', [ChatRequestController::class, 'dashboard'])->name('home');





Route::get('/dashboard', [ChatRequestController::class, 'dashboard'])->name('dashboard');


Route::get('/search_in_message', [ChatRequestController::class, 'search_in_message'])->name('search_in_message');

Route::get('/search_result_click_redirect/{chat_request}/{chat}', [ChatRequestController::class, 'search_result_click_redirect'])->name('search_result_click_redirect');



Route::get('/notifications', [SystemController::class, 'getnotifications'])->name('notifications');

Route::get('/home', [SystemController::class, 'home'])->name('home');


Route::get('/webhook_report', [MetaAppController::class, 'webhook_report'])->name('webhook_report');



 
 
Route::post('/settings', [SettingsController::class, 'settings'])->name('settings');

 
Route::post('/delete_meta_app', [MetaAppController::class, 'delete_meta_app'])->name('delete_meta_app');

 
Route::post('/enable_disable_app', [MetaAppController::class, 'enable_disable_app'])->name('enable_disable_app');


Route::get('/meta_apps_list', [MetaAppController::class, 'meta_apps_list'])->name('meta_apps_list');
Route::post('/create_meta_app', [MetaAppController::class, 'create_meta_app'])->name('create_meta_app');



Route::get('/manage_app', function () {
    return view('manage_app');
})->name('manage_app');;




Route::get('/chat_requests', [ChatRequestController::class, 'index'])->name('chat_requests');

Route::post('/create_message', [ChatRequestController::class, 'store'])->name('create_message');

Route::post('/create_chat_message_scheduled', [ChatRequestController::class, 'create_chat_message_scheduled'])->name('create_chat_message_scheduled');



Route::post('/update_chat_request_status', [ChatRequestController::class, 'update_chat_request_status'])->name('update_chat_request_status');


Route::post('/create_customer_note', [ChatRequestController::class, 'create_customer_note'])->name('create_customer_note');


Route::post('/set_fav_unfav', [ChatRequestController::class, 'set_fav_unfav'])->name('set_fav_unfav');




Route::get('/chat_messages', [ChatRequestController::class, 'chat_messages'])->name('chat_messages');
Route::post('/create_chat_message', [ChatRequestController::class, 'create_chat_message'])->name('create_chat_message');





    
    
    
    Route::get('settings',[ SettingsController::class,'get_settings'])->name("get_settings") ;
    
    Route::post('settings_notifications',[ SettingsController::class,'settings_notifications'])->name("settings_notifications") ;
    
    Route::post('settings_recaptcha',[ SettingsController::class,'settings_recaptcha'])->name("settings_recaptcha") ;
    
    
    Route::post('settings_branding',[ SettingsController::class,'settings_branding'])->name("settings_branding") ;
    
    
    
    Route::post('settings_logo',[ SettingsController::class,'settings_logo'])->name("settings_logo") ;
    
     
    Route::post('settings_chat_gpt_auth_key',[ SettingsController::class,'settings_chat_gpt_auth_key'])->name("settings_chat_gpt_auth_key") ;
    
     

});


 Auth::routes(); 

 Route::view('login', 'auth.login_with_otp')->name('login_with_otp');
 
 
Route::post('login_with_otp', [AuthController::class, 'login_with_otp']   )->name('login_with_otp'); 

Route::post('verify_login_with_otp', [AuthController::class, 'verify_login_with_otp']   )->name('verify_login_with_otp'); 




