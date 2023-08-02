@extends('layouts.app')

@section('content')

  
 
<div class="container">
    
   
    
    
    <h2   class="mt-5  mb-5">Notifications</h2> 
    
    
    
    
    
    <div class="row">
        <div class="col-12">
               
                      
 
           <table class="table" >
               
               
               
     
           
                 @foreach($unread_notifications  as $notification) 
                 
                 <tr>
                     
                     
                  
   
    <td> {{ $notification->data['message']  }}  </td> 
    <td> {{ $notification->created_at  }}  </td> 
   
   
    
   
    
     
           
              </tr>
              @endforeach
              
              
                    </table>
                    
                    
                    <hr/>
               
   
              
                                      
 
           <table class="table" >
               
                     @foreach($notifications  as $notification) 
                 
                 <tr>
                      
   
    <td> {{ $notification->data['message']  }}  </td> 
    <td> {{ $notification->created_at  }}  </td> 
    
           
              </tr>
              @endforeach
              
              
                    </table>
           


@endsection
