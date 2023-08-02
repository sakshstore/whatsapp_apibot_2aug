 
             
             
                        <span class="header">API key</span>
                
  <form method="POST" action="{{ route('settings_api_key') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            
 
        
        <div class="form-group  mb-3">
        
  <label for="api_key" class="form-label">API key</label>
  
  
  <input type="text" class="form-control  ($errors->has('api_key') ? ' is-invalid' : '')  " id="api_key" readonly  value="{{ $settings->api_key }}"    name="api_key"  >
  
    {!! $errors->first('api_key', '<div class="invalid-feedback">:message</div>') !!}
</div>
      
       



        <button type="submit" class="btn btn-primary w-100 mt-5  mb-3">Generate a new Key</button>
  

                        </form>
                        
                        Api sample code
                        
                        
                       <script src="https://gist.github.com/sakshstore/2cf0bf3248fe1e8b7f399fede2a0388e.js"></script>
                         