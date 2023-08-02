  
  
       Image 
       
       <form action="{{ route('create_image_message' ) }}?app_id={{$app->id}}&chat_requests_id={{$chat_requests_id}}"
      class="dropzone"
      id="thumbnail-dropzone">
    
        @csrf
      
      
      
</form>
 