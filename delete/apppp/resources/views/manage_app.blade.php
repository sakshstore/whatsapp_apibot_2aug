@extends('layouts.app')

@section('content')

 
 
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  
 
<div class="container">
     
    <h2   class="mt-5  mb-5">Meta App management </h2> 
    <div class="row">
     
       
        <div class="col-12 ">
      
        
        
        
        
        <p>
  <a class="btn btn-primary " data-bs-toggle="collapse" href="#collapseForm" role="button" aria-expanded="false" aria-controls="collapseForm">
  Add new App
  </a>
 
</p>
<div class="collapse" id="collapseForm">
  <div class="card card-body  mb-3 ">
      
      
    <form id="postForm" name="postForm" class="form-horizontal">
         
      
     
           
            <div class="form-group  mt-2">
                <label for="name" class="  control-label">Name</label>
               
                    <input type="text" class="form-control" id="name" name="name" value="" required="">
                       </div>
      
      
      
        <div class="form-group  mt-2">
                <label for="from_phone_number" class="  control-label">From phone number</label>
               
                    <input type="text" class="form-control" id="from_phone_number" name="from_phone_number" value="" required="">
                       </div>
      
      
      
        <div class="form-group  mt-2">
                <label for="from_phone_number_id" class="  control-label">From phone number id</label>
               
                    <input type="text" class="form-control" id="from_phone_number_id" name="from_phone_number_id" value="" required="">
                       </div>
      
      
      
        <div class="form-group mt-2">
                <label for="access_token" class="  control-label">Access token</label>
               
                    <input type="text" class="form-control" id="access_token" name="access_token" value="" required="">
                       </div>
      
      
        <div class="form-group mt-2">
                <label for="delete_protected" class="  control-label">Delete Protection</label>
               
                     
                    
                    <select class="form-control" id="delete_protected" name="delete_protected" required=""  >
                        
                        <option value="free"> Free to delete</option>
                        <option value="protect"> Protect from acidental delete</option>
                    </select>
                    
                       </div>
      
      
     
      
      
      
     <div class="form-group  mt-2">
        
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Create App
             </button>
                   </div>
        </form>
  </div>
</div>



        
           
          <table class="table table-bordered"  >
          
           <tbody id="meta_app_list">
             
           </tbody>
          </table>
          
    
          
       </div> 
    </div>
</div>

<script>
 
 
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
    
    $('#meta_apps').empty(); 
    
      
     
     
      $.ajax({
          data: $('#postForm').serialize(),
          url: "{{ route('create_meta_app') }}",
          type: "post",
          dataType: 'json',
          success: function (meta_apps_list) {
              
    meta_apps_list.forEach(print_meta_apps_list);

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

 reload_meta_app(); 

function reload_meta_app( from_number )
{
    
      $('#meta_apps').empty(); 
      
      
      
       $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      
    
      $.ajax({
          data: $('#postForm').serialize(),
          url: "{{ route('meta_apps_list' ) }}",
          type: "GET",
          dataType: 'json',
          success: function (meta_apps_list) {
              
              
             meta_apps_list.forEach(print_meta_apps_list);
              
              
              
               
         
              
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    
    
       });
}


 function print_meta_apps_list(data){
     
     
       
    
         var post = '<tr id="post_id_' + data.id + '"><td>  ' + data.name + '   </td><td>  ' + data.from_phone_number + '   </td><td>  ' + data.from_phone_number_id + '   </td><td>  ' + data.created_at + '   </td><td>  ' + data.status + '   </td> <td>';
         
         if(data.status=="Disable")
          
  post +=  '<a   onclick="enable_disable_app( ' + data.id  + ', 1  )"  class="m-1 enable_disable"   > Enable  </a>';
          
          else
          
 post +=  '<a  onclick="enable_disable_app( ' + data.id  +  ',0  )"    class="m-1 enable_disable"> Disable  </a>';
 
 
    if(data.delete_protected=="Free")
          
 post +=  '<a   onclick="delete_app( ' + data.id  + ' )"    class="m-1 delete" > Delete</a>';
                           
                           
                           
                        post += ' </td>';
                        
                        post +="</tr>";     
                        
                        
            
              
             
                  $('#meta_app_list').prepend(post); 
 }
 
 
 
  function enable_disable_app(id,status)
 {
      
   
   
  var formData = {
      id: id ,
      status : status
    };



      $.ajax({
          
            data: formData ,
          url: "{{ route('enable_disable_app') }}",
          type: "post",
          dataType: 'json',
          
           
          success: function (meta_apps_list) {
              
               $('#meta_app_list').empty(); 
             meta_apps_list.forEach(print_meta_apps_list);
 
          },
          error: function (data) {
              console.log('Error:', data);
             
          }
      });
    
    
        
 }
 
 function delete_app(id)
 { 
   
   
  var formData = {
      id: id
    };



      $.ajax({
          
            data: formData ,
          url: "{{ route('delete_meta_app') }}",
          type: "post",
          dataType: 'json',
          
           
          success: function (meta_apps_list) {
              
               $('#meta_app_list').empty(); 
             meta_apps_list.forEach(print_meta_apps_list);
              
              
              
               
         
              
          },
          error: function (data) {
              console.log('Error:', data);
             
          }
      });
    
    
       
 }
 
 
 
   
 
  

 


</script>



@endsection
