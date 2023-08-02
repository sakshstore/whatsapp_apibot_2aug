<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
 
use App\Http\Controllers\WebhookController;

 use App\Http\Controllers\APIController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|php artisan make:model AuthSystem --all
*/


 

    
  Route::prefix('v1')->group(function () {

  
Route::post('sendMessage', [APIController::class, 'sendMessage'])->name("sendMessage");



Route::controller(WebhookController::class)->group(function(){
    Route::any('fbwebhook', 'receive_fbwebhook') ;
    
    
    
    
}); 
      
      
      
      
  }); 



 
   