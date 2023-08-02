@extends('layouts.app')

@section('content')
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
         
 
  <meta name="csrf-token" content="{{ csrf_token() }}">
 
  
 
<div class="container">
    
   
    
    
    <h2   class="mt-5  mb-5">Chat board   [ {{$app->name}} ]</h2> 
    
    
    
    
    
    <div class="row">
        <div class="col-3">
               
             <form id="select_app" name="select_app" class=" form-horizontal">
         
         
            <div class="form-group  mb-2  ">
                <label for="select_app" class="  control-label">Change App</label>
               
               <select name="app_id"  class="form-control"   id="form-control"  >
                   
         
 
 
 
                 @foreach($meta_apps as $app_) 
            <option value="{{$app_->id}}">{{$app_->name}}</option> 
        
              
              @endforeach
              
              
               </select>
                   </div>
      
     <div class="form-group  mb-2">
        
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Change App
             </button>
                   </div>
        </form>
        
        <hr />
          
 
          
          
          <button onclick="load_chat_requests( '{{$app->id}}', 'new' )">New User</button>
          
          <button onclick="load_chat_requests( '{{$app->id}}', 'Banned' )">Banned User</button>
          
          
          <button onclick="load_chat_requests( '{{$app->id}}', 'Premium' )">Premium User</button>
          <table class="pt-5 table table-bordered" id="laravel_crud">
            
           <tbody id="chat_requests_crud">
             
           </tbody>
          </table>
          
          
          
       </div> 
       
       
        <div class="col-9">
      
 
       
        <h2   class=" pt-2  mb-2"> {{$from_number}} [ {{$app->name}} ] </h2> 
        
   
        
        
        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
    <button class="nav-link" id="nav-tag-tab" data-bs-toggle="tab" data-bs-target="#nav-tag" type="button" role="tab" aria-controls="nav-tag" aria-selected="false">Tag User</button>
    <button class="nav-link" id="nav-now-tab" data-bs-toggle="tab" data-bs-target="#nav-now" type="button" role="tab" aria-controls="nav-now" aria-selected="false">Send Message</button>
    <button class="nav-link" id="nav-schedule-tab" data-bs-toggle="tab" data-bs-target="#nav-schedule" type="button" role="tab" aria-controls="nav-schedule" aria-selected="false"  >Schedule Message</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
  

    <form id="customer_note" name="customer_note" class="form-horizontal">
      
      
 
           <input type="hidden" name="chat_requests_id" value="{{$chat_requests_id}}">
           
           
            <div class="form-group  mb-2">
                <label for="message" class="  control-label">  Short Customer Note </label>
 <input type="text" class="form-control" id="customer_note" name="customer_note" value="{{$chat_requests_row->customer_note}}" required="">
                       </div>
    
      
     <div class="form-group mb-2">
        
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save/Update Customer note
             </button>
                   </div>
        </form>
        
        
        </div>
  
  
  
  
  <div class="tab-pane fade" id="nav-tag" role="tabpanel" aria-labelledby="nav-tag-tab" tabindex="0"> 
  
  <button onclick="update_chat_request_status( '{{$from_number}}', '{{$app->id}}','banned' )">Ban User</button>
        
          <button onclick="update_chat_request_status( '{{$from_number}}', '{{$app->id}}','premium' )">Premium User</button></div>
          
          
          
          
  <div class="tab-pane fade" id="nav-now" role="tabpanel" aria-labelledby="nav-now-tab" tabindex="0">
      
      
       <form id="postForm" name="postForm" class="form-horizontal">
      
      
          <input type="hidden" name="app_id" value="{{$app->id}}">
           <input type="hidden" name="chat_requests_id" value="{{$chat_requests_id}}">
           
           
            <div class="form-group  mb-2">
                <label for="message" class="  control-label">Message</label>
               
                    <input type="text" class="form-control" id="message" name="message" value="" required="">
                       </div>
    
      
     <div class="form-group mb-2">
        
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Send Message
             </button>
                   </div>
        </form></div>
        
        
        
  <div class="tab-pane fade" id="nav-schedule" role="tabpanel" aria-labelledby="nav-schedule-tab" tabindex="0">
      
      
       <form id="postForm_scheduled_at" name="postForm" class="form-horizontal">
      
      
          <input type="hidden" name="app_id" value="{{$app->id}}">
           <input type="hidden" name="chat_requests_id" value="{{$chat_requests_id}}">
           
           
            <div class="form-group  mb-2">
                <label for="message" class="  control-label">Message</label>
               
                    <input type="text" class="form-control" id="message" name="message" value="" required="">
                       </div>
       <div class="form-group  mb-2">
                <label for="scheduled_at" class="  control-label">Schedule At</label>
               
                    <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at" value="" required="">
                       </div>
      
     <div class="form-group mb-2">
        
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Send Message
             </button>
                   </div>
        </form></div>
</div>



         
          
          
        
            
        
        
      
          
          <button onclick="load_chat_messages('{{$from_number}}', '{{$app->id}}', 'fav' )">Fav Message  </button>
          
          <button onclick="load_chat_messages('{{$from_number}}', '{{$app->id}}', '' )">All Message  </button>
          
          
          <table class="table table-bordered"  >
          
           <tbody id="chat_messages">
             
           </tbody>
          </table>
          
    
          
       </div> 
    </div>
</div>



        
        
        <script src="https://unpkg.com/@yaireo/tagify"></script>
  <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
  
  <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
  
<script>
 
 
   var input = document.querySelector('input[name=tags]');

// initialize Tagify on the above input node reference
new Tagify(input)







 
 if ($("#customer_note").length > 0) {
      $("#customer_note").validate({
 
     submitHandler: function(form) {
      var actionType = $('#btn-save-customer-note').val();
      $('#btn-save-customer-note').html('Sending..');
      
      
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    
    
      $.ajax({
          data: $('#customer_note').serialize(),
          url: "{{ route('create_customer_note') }}",
          type: "post",
          dataType: 'json',
          success: function (response) {
              
       
              console.log(response);;
              
               
 
      
              $('#btn-save-customer-note').html('Save Changes');
              
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save-customer-note').html('Save Changes');
          }
      });
    }
  })
}


 
 if ($("#postForm").length > 0) {
      $("#postForm").validate({
 
     submitHandler: function(form) {
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
      
      
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    
    
      $.ajax({
          data: $('#postForm').serialize(),
          url: "{{ route('create_chat_message') }}",
          type: "post",
          dataType: 'json',
          success: function (response) {
              
       
              console.log(response);;
              
              
              
//load_chat_requests( {{$app->id}},"new");
load_chat_messages({{$from_number}},{{$app->id}});


  $('#postForm').trigger("reset");
      
              $('#btn-save').html('Save Changes');
              
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}






 if ($("#postForm_scheduled_at").length > 0) {
      $("#postForm_scheduled_at").validate({
 
     submitHandler: function(form) {
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
      
      
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    
    
      $.ajax({
          data: $('#postForm_scheduled_at').serialize(),
          url: "{{ route('create_chat_message_scheduled') }}",
          type: "post",
          dataType: 'json',
          success: function (response) {
              
       
              console.log(response);;
              
              
              
//load_chat_requests( {{$app->id}},"new");
load_chat_messages({{$from_number}},{{$app->id}});


  $('#postForm').trigger("reset");
      
              $('#btn-save').html('Save Changes');
              
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}



//load_chat_requests( {{$app->id}},"new");
load_chat_messages({{$from_number}},{{$app->id}});



function update_chat_request_status( from_number , app_id ,status)
{
     
 
 
 
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    
      $.ajax({
          
          url: "{{ route('update_chat_request_status') }}?from_number="+from_number+"&app_id="+  app_id+"&status="+  status ,
          
          type: "post",
          dataType: 'json',
          success: function (res) {
              
              
             console.log(res);
              
           
              
          },
          error: function (data) {
              console.log('Error:', data);
             
          }
      });
    
     
}



function set_fav_unfav(chat_id ,status)
{
     
 
 
 
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    
      $.ajax({
          
          url: "{{ route('set_fav_unfav') }}?chat_id="+chat_id+  "&status="+  status ,
          
          type: "post",
          dataType: 'json',
          success: function (res) {
              
              
             console.log(res);
              
           
              
          },
          error: function (data) {
              console.log('Error:', data);
             
          }
      });
    
     
}

function load_chat_requests(  app_id,status )
{
     
 $('#chat_requests_crud').empty(); 
    
      $.ajax({
          
          url: "{{ route('chat_requests') }}?app_id="+  app_id +"&status="+  status ,
          
          type: "GET",
          dataType: 'json',
          success: function (chat_requests) {
              
              
             chat_requests.forEach(print_chat_request_row);
              
           
              
          },
          error: function (data) {
              console.log('Error:', data);
             
          }
      });
    
     
}



function load_chat_messages( from_number ,app_id,status='')
{
      
    
     $('#chat_requests_crud').empty(); 
        $('#chat_messages').empty(); 
        
        
      $.ajax({
         
          url: "{{ route('chat_messages' ) }}?from_number="+from_number+"&app_id="+app_id+"&status="+status,
          type: "GET",
          dataType: 'json',
          success: function (chat_messages) {
              
              
             chat_messages.forEach(print_chat_message_row);
              
                },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    
     
}


 function print_chat_message_row(data){
     
       var post = '<tr id="post_id_' + data.id + '"><td>  ' + data.from_number + '   </td><td>  ' + data.message + '   </td><td>  ' + data.timeago + '    ';
            
       
     post  = post+'  <button onclick="set_fav_unfav( ' + data.id + ',\'fav\'  )">Fav</button>  ';
     post  = post+'  <button onclick="set_fav_unfav( ' + data.id + ',\'\'  )">Remove Fav</button>  ';
          
                  post  = post+'    </td>    </tr>';
                  $('#chat_messages').prepend(post); 
 }
 
 
 
 
 
function print_chat_request_row(data )
{
   var url="{{ route('dashboard'  ) }}?from_number="+data.from_number+"&app_id="+ data.app_id;
    
    
         var post = '<tr id="post_id_' + data.from_number + '"><td><a href="' +url+ '"> ' + data.name + ' ( ' + data.from_number + ') </a></td> </tr>';
            
              
             
                  $('#chat_requests_crud').prepend(post);
                  
}
   
 
 
 
 $(document).ready(function() {
 load_chat_requests( '{{$app->id}}', 'new' );
 
 
 
 





});
 
 
 
  function saksh_reload_page(  )
{
   console.log("Reloading page");
   
   
   load_chat_messages('{{$from_number}}','{{$app->id}}');
    load_chat_requests( '{{$app->id}}', 'new' );
   
                  
}
   
 
 
 
 
     
      const pusher = new Pusher(
        "492080341233db368eba", // Replace with 'key' from dashboard
        {
          cluster: "ap2"  // Replace with 'cluster' from dashboard
          }
      );
       
      
  const channel = pusher.subscribe("webhook_received");
  channel.bind("webhook_received", saksh_reload_page       );
   
   
    </script>
 
   


@endsection
