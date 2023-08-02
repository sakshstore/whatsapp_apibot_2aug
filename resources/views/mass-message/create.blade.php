@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Mass Message
@endsection

@section('content')
    <section class="content container ">
        <div class="row">
            <div class="col-md-12">

               
 
                        <span class="card-title">{{ __('Create') }} Mass Message</span>
                    
                 
                        <form method="POST" action="{{ route('mass-messages.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                                    
                   <div class="form-group  mb-2">
                <label for="message" class="  control-label">Title</label>
               
                    <input type="text" class="form-control" id="title" name="title" value="" required >
                    
                     {!! $errors->first('title', '<div class="invalid-feedback">:title</div>') !!}
                     
                     
                       </div>
    
                           
                   <div class="form-group  mb-2">
                <label for="message" class="  control-label">Customer Tags</label>
               
                    <input type="text" class="form-control" id="customer_tags" name="customer_tags" value="" required >
                    
                     {!! $errors->first('customer_tags', '<div class="invalid-feedback">:customer_tags</div>') !!}
                     
                     
                       </div>
    
         
                     
                     
                       </div>    
           <div class="form-group  mb-2">
                <label for="message_v1" class="  control-label">Message  Version 1</label>
               
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contentModel" data-bs-whatever="message_v1">Select/Generate Template</button>
               <textarea class="form-control"  id="message_v1" name="message_v1"  >
 
</textarea>

 
                    
                     {!! $errors->first('message_v1', '<div class="invalid-feedback">:message_v1</div>') !!}
                     
                     
                       </div>    
           <div class="form-group  mb-2">
                <label for="message_v2" class="  control-label">Message Version 2</label>
               
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contentModel" data-bs-whatever="message_v2">Select/Generate Template</button>
               <textarea class="form-control"  id="message_v2" name="message_v2"  >
 
</textarea>

 
                    
                     {!! $errors->first('message_v2', '<div class="invalid-feedback">:message_v2</div>') !!}
                     
                     
                       </div>    
           <div class="form-group  mb-2">
                <label for="message_v3" class="  control-label">Message Version 3</label>
               
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contentModel" data-bs-whatever="message_v3">Select/Generate Template</button>
               
<textarea class="form-control"  id="message_v3" name="message_v3"  >
 
</textarea>


 
                     
                       </div>    
           <div class="form-group  mb-2">
                <label for="message_v4" class="  control-label">Message Version 4</label>
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contentModel" data-bs-whatever="message_v4">Select/Generate Template</button>
                  
                  <textarea class="form-control"  id="message_v4" name="message_v4"  >
 
</textarea>

 
                    
                     {!! $errors->first('message_v4', '<div class="invalid-feedback">:message_v4</div>') !!}
                     
                     
                       </div>    
           <div class="form-group  mb-2">
                <label for="message_v5" class="  control-label">Message Version 5</label>
                
                
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contentModel" data-bs-whatever="message_v5">Select/Generate Template</button>
               
  <textarea class="form-control"  id="message_v5" name="message_v5"  >
 
</textarea>


                   
                    
                     {!! $errors->first('message_v5', '<div class="invalid-feedback">:message_v5</div>') !!}
                     
                     
                       </div>
      
      
      
      
        <div class="form-group  mb-2">
                <label for="scheduled_at" class="  control-label">Schedule At</label>
               
                    <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at" value="{{$massMessage->scheduled_at}}" required >
                    
                     {!! $errors->first('scheduled_at', '<div class="invalid-feedback">:message</div>') !!}
                     
                     
                       </div>
      
        
       
      
        <div class="  mb-2">
       
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
     
    </div>
      


                        </form>
                   
            </div>
        </div>
    </section>
    
 

<div class="modal fade" id="contentModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
        
          <div class="accordion accordion-flush" id="accordion">
 
 
 
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAI" aria-expanded="false"
      aria-controls="collapseAI">
    AI generate content
      </button>
    </h2>
    <div id="collapseAI" class="accordion-collapse collapse" data-bs-parent="#accordion">
      <div class="accordion-body">
       
      
         <form>
            
             <input type="hidden" class="form-control" id="requested_by">
             
             
          <div class="mb-3">
            <label for="ai_query" class="col-form-label">AI query</label>
           
            
              <input type="text" class="form-control" id="ai_query">
              
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">AI Response</label>
            <textarea class="form-control" id="ai_response"></textarea>
            
     <button type="button" id="generate_content_btn" class="btn  mt-3 w-100 btn-primary">Generate content</button>
     
       <button type="button"      class="btn btn-primary   w-100 mt-3" data-bs-dismiss="modal">Use this</button>
       
       
          </div>
        </form>
       
      </div>
    </div>
  </div>
  
   @foreach ($templates as $template)
   
   
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $template->id }}" aria-expanded="false" aria-controls="collapse{{ $template->id }}">
        {{ $template->name }}
      </button>
    </h2>
    <div id="collapse{{ $template->id }}" class="accordion-collapse collapse" data-bs-parent="#accordion">
      <div class="accordion-body">
       
       {{ $template->message }}
   
       <button type="button"    onclick="saksh_return_content('{{ $template->message }}')"   class="btn btn-secondary closebtn" data-bs-dismiss="modal">Use this</button>
       
      </div>
    </div>
  </div>
  
     @endforeach
     
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

 
 
@endsection
    
@section('script')

  <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
  
  
<style>
.tags-look .tagify__dropdown__item{
  display: inline-block;
  vertical-align: middle;
  border-radius: 3px;
  padding: .3em .5em;
  border: 1px solid #CCC;
  background: #F3F3F3;
  margin: .2em;
  font-size: .85em;
  color: black;
  transition: 0s;
}

.tags-look .tagify__dropdown__item--active{
  color: black;
}

.tags-look .tagify__dropdown__item:hover{
  background: lightyellow;
  border-color: gold;
}

.tags-look .tagify__dropdown__item--hidden {
    max-width: 0;
    max-height: initial;
    padding: .3em 0;
    margin: .2em 0;
    white-space: nowrap;
    text-indent: -20px;
    border: 0;
}
</style>

  <script src="https://unpkg.com/@yaireo/tagify"></script>
  <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>


  <script src="/ckeditor/build/ckeditor.js"></script>
    <script>
        
  
        var input = document.querySelector('input[name=customer_tags]') ;
        
        
        
// init Tagify script on the above inputs
var tagify = new Tagify(input, {
  whitelist: [ '<?php    echo implode("','",$tags);?>'],
 
   dropdown: {
        maxItems: 20,           // <- mixumum allowed rendered suggestions
        classname: "tags-look", // <- custom classname for this dropdown, so it could be targeted
        enabled: 0,             // <- show suggestions on focus
        closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
      }
      
      
})
 
 
 
 

 const contentModel = document.getElementById('contentModel')
if (contentModel) {
  contentModel.addEventListener('show.bs.modal', event => {
      
      
 
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    const modalTitle = contentModel.querySelector('.modal-title')
    const modalBodyInput = contentModel.querySelector('input#requested_by')

    modalTitle.textContent = `New message to ${recipient}`
    modalBodyInput.value = recipient
   // document.getElementByClass("requested_by").value =recipient;
    
     
  })
}





$(document).ready(function(){


$( "#generate_content_btn" ).on( "click", function() {
    
    
       var ai_query =$('input#ai_query').val() ;
       
    
 
  
  update_chat_request_status(ai_query );
  
} );



});



function update_chat_request_status(ai_query )
{
    
 
   $.ajaxSetup(
   {
      headers:
      {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax(
   {
      url: "{{ route('generate_ai_content') }}?ai_query=" + ai_query ,
      type: "post",
      dataType: 'json',
      success: function(res)
      {
          
          
          console.log(res);
          console.log(res.contents);
          $('#ai_response').val(res.contents) ;
          
     
     
          
          
      },
      error: function(data)
      {
         console.log('Error:', data);
      }
   });
   
 
}




     

    let message_v1;
let message_v2;
let message_v3;
let message_v4;
let message_v5;  


  
  

async function loadEditor() {
  
  
  message_v1=await      ClassicEditor
        .create(document.querySelector('#message_v1')) ;
        
          message_v2=await      ClassicEditor
        .create(document.querySelector('#message_v2')) ;
        
          message_v3=await      ClassicEditor
        .create(document.querySelector('#message_v3')) ;
        
          message_v4=await      ClassicEditor
        .create(document.querySelector('#message_v4')) ;
        
          message_v5=await      ClassicEditor
        .create(document.querySelector('#message_v5')) ;
        
        
         
}

loadEditor();



 function saksh_use_generated_content(){
    
  var content=   $('#ai_response').val( ) ;
  
  saksh_return_content(content);
}

function saksh_return_content(content)
{
   var requested_by =$('input#requested_by').val() ;
      
  console.log(requested_by);
    
   // var x=document.getElementById(requested_by);
    
  //   x.value = content
 if(requested_by=="message_v1")
  message_v1.setData(content);
    
     if(requested_by=="message_v2")
  message_v2.setData(content);
  
   if(requested_by=="message_v3")
  message_v3.setData(content);
  
   if(requested_by=="message_v4")
  message_v4.setData(content);
  
   if(requested_by=="message_v5")
  message_v5.setData(content);
  
}



        
</script>
@endsection

