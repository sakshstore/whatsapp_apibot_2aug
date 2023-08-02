<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|

Broadcast::channel('user.{userId}', function ($user, $userId) {
  return $user->id === $userId;
});

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
   // return (int) $user->id === (int) $id;
   
   return true;
});


 

Broadcast::channel('chat', true);
Broadcast::channel('webhook_received', function ($user, $id) {
   // return (int) $user->id === (int) $id;
   
   return "true";
});
 */
 
 Broadcast::channel('webhook_received', function ($user, $id) {
   // return (int) $user->id === (int) $id;
   
   return  true;
}); 


