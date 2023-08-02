 
            <form action="{{ route('settings_logo' ) }}"
      class="dropzone"
      id="thumbnail-dropzone">
    
        @csrf
      
      
      
</form>
 
 
 
 
@section('style')

 
 <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
 
@endsection


@section('script')



         
 
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>


<script>
 
    $(".dropzone").dropzone( );
              
    </script>
@endsection