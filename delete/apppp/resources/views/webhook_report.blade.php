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
    
   
    
    
    <h2   class="mt-5  mb-5">Webhook report [Latest 50 Only] </h2> 
    
    
    
    
    
    <div class="row">
        <div class="col-12">
               
                      
 
           <table class="table" >
               
               
               
     
           
                 @foreach($webhook_reports  as $webhook_report) 
                 
                 <tr>
                     
                     
                  
   
    <td> {{ $webhook_report->data   }}  </td> 
    <td> {{ $webhook_report->created_at  }}  </td> 
   
   
    
   
    
     
           
              </tr>
              @endforeach
              
              
                    </table>
                    
                    
         
               
   
              
                                      
  
           


@endsection
