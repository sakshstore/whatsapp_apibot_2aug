@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Mass Message
@endsection

@section('content')
    <section class="content container ">
        <div class="row">
            <div class="col-md-12">

         
         
  <span class="card-title">{{ __('Update') }} Mass Message</span>
             
                 
                 
                 
 <form action="{{ route('add_image_in_mass_messages',$massMessage->id ) }}"
      class="dropzone"
      id="thumbnail-dropzone">
    
        @csrf
      
      
      
</form>
 
 
                         
                         
                 
                 
                 
            </div>
        </div>
    </section>
    
    
    
    



@endsection



    
@section('script')

 
  
 
 
 <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
         
 
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>


<script>
 
   
         
         
         $(".dropzone").dropzone( );
              
      
                         </script>
@endsection
