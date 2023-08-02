@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Mass Message
@endsection

@section('content')
    <section class="content container ">
        <div class="row">
            <div class="col-md-12">

         
         
         

          
                        <span class="card-title">{{ __('Update') }} Mass Message</span>
             
                 
                        <form method="POST" action="{{ route('mass-messages.update', $massMessage->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                        
                            <div class="form-group  mb-2">
                <label for="message" class="  control-label">Customer Tags</label>
               
                    <input type="text" class="form-control" id="customer_tags" name="customer_tags" value="{{$massMessage->customer_tags}}"  required >
                    
                     {!! $errors->first('customer_tags', '<div class="invalid-feedback">:customer_tags</div>') !!}
                     
                     
                       </div>
                         
  
  
   <div class="form-group  mb-2">
                <label for="message" class="  control-label">Message</label>
               
                    <input type="text"  class="form-control" id="message" name="message"  value="{{$massMessage->message}}"    required >
                    
                     {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
                     
                     
                       </div>
                       
       
    
     <div class="form-group  mb-2">
                <label for="scheduled_at" class="  control-label">Schedule At</label>
               
                    <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at"  value="{{$massMessage->scheduled_at}}" required >
                    
                     {!! $errors->first('scheduled_at', '<div class="invalid-feedback">:message</div>') !!}
                     
                     
                       </div>
   
 
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button> 

                        </form>
                 
                 
                 
            </div>
        </div>
    </section>
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
 
    
    </script>
@endsection
