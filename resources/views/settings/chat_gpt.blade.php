 
             
             
                        <span class="header">Chat gpt auth key</span>
                
  <form method="POST" action="{{ route('settings_chat_gpt_auth_key') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            
 
        
        <div class="form-group  mb-3">
        
  <label for="chat_gpt_auth_key" class="form-label">Chat gpt auth key</label>
  
  
  <input type="text" class="form-control  ($errors->has('chat_gpt_auth_key') ? ' is-invalid' : '')  " id="chat_gpt_auth_key"  value="{{ $settings->chat_gpt_auth_key }}"    name="chat_gpt_auth_key"  >
  
    {!! $errors->first('chat_gpt_auth_key', '<div class="invalid-feedback">:message</div>') !!}
</div>
      
       



        <button type="submit" class="btn btn-primary w-100 mt-5">Submit</button>
  

                        </form>
                         