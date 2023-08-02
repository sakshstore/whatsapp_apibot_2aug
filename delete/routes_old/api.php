<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
 
use App\Http\Controllers\WebhookController;

 

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

  
Route::controller(WebhookController::class)->group(function(){
    Route::any('fbwebhook', 'receive_fbwebhook') ;
    
    
    
    
}); 
      
      
      
      
  }); 



 
   