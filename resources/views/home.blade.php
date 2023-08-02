@extends('layouts.app')

@section('content')

  
 
<div class="container">
    
   
    
    
    <h2   class="mt-5  mb-5">Message count data</h2> 
    
    
    
    
    
    <div class="row">
        <div class="col-12">
               
                      
 
           <table class="table" >
               
               
               
     <tr> <td>Data</td><td>Total Message</td></tr>
           
                 @foreach($messages_count_data  as $message_count_data) 
                 
                 <tr>
                     
                     
                  
    
    <td> {{ $message_count_data->date  }}  </td> 
    
    <td> {{ $message_count_data->messages_count  }}  </td> 
   
   
    
   
    
     
           
              </tr>
              @endforeach
              
              
                    </table>
                    
                  
                    
                    
           <table class="table" >
               
               
               
     <tr> <td>Data</td><td>Total Message</td></tr>
           
                 @foreach($chat_requests_count_data  as $chat_request_count_data) 
                 
                 <tr>
                     
                     
                  
    
    <td> {{ $chat_request_count_data->from_number  }}  </td> 
    
    <td> {{ $chat_request_count_data->app_id  }}  </td> 
   
   
    
   
    
     
           
              </tr>
              @endforeach
              
              
                    </table>
                    
               


@endsection
