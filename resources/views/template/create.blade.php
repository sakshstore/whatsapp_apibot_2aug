@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Template
@endsection

@section('content')
    <div class="content container  ">
        <div class="row">
            <div class="col-md-12">

          

                
                   {{ __('Create') }} Template 
                  
                        <form method="POST" action="{{ route('templates.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                          
        <div class="form-group mb-3">
            
            
            
  <input type="text" class="form-control" id="name" name="name" value="" required="">
                   {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}      
                      
                       </div>
    
           
          
          
              <div class="form-group mt-3 mb-3">
            
            
               <textarea class="form-control editor"   id="message" name="message"  >
 
</textarea>
            
 
                   {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}      
                      
                       </div>
    
    
    
    
     
            
  
  <button type="submit" class="btn btn-primary mt-3 mb-3">{{ __('Submit') }}</button> 

                        </form>
                     
            
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
 
<script>
    ClassicEditor
        .create(document.querySelector('#message'))
        .then(editor => { console.log(editor); })
        .catch(error => { console.error(error); });
        
        
         
        
        
</script>

@endsection