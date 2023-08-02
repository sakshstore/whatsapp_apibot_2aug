@extends('layouts.app')

@section('content')

  <style>
 
 td {
  white-space: normal !important; 
  word-wrap: break-word;  
}
table {
  table-layout: fixed;
}
  </style>
 
<div class="container">
    
   
    
    
    <h2   class="mt-5  mb-5">Search result  [Latest 50 Only] </h2> 
    
    
    
    
    
    <div class="row">
        <div class="col-12">
               
                      
  
               
               
               
          
    
    
    
     
   @foreach($chats  as $chat) 
      <a href="{{ route('search_result_click_redirect' ,[$chat->chat_requests_id,$chat->id]) }}"> 
              {{ $chat->message   }}

        
         
        
   
    
 <br />    
 <br />
    from_number {{ $chat->from_number   }}  Type  {{ $chat->type   }}   Chat Request Id {{ $chat->chat_requests_id   }}  created_at   {{ $chat->created_at  }}
 
   
   
    
   chatrequest
    
     
           
            <hr />    
 <br />    
 <br />     </a>
 
              @endforeach
              
              
                  
                    
         
               
   
              
                                      
  
           


@endsection
