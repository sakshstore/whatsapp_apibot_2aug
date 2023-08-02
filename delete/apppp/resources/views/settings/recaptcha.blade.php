 
             
             
                        <span class="header">Recaptcha</span>
                
  <form method="POST" action="{{ route('settings_recaptcha') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            
 
        
        <div class="form-group  mb-3">
        
  <label for="recaptcha_key" class="form-label">Recaptcha Key</label>
  
  
  <input type="text" class="form-control  ($errors->has('recaptcha_key') ? ' is-invalid' : '')  " id="recaptcha_key"  value="{{ $settings->recaptcha_key }}"    name="recaptcha_key"  >
  
    {!! $errors->first('recaptcha_key', '<div class="invalid-feedback">:message</div>') !!}
</div>
      
      
      
      
       <div class="form-group  mb-3">
        
  <label for="recaptcha_secret" class="form-label">Recaptcha Secret</label>
  
  
  <input type="text" class="form-control  ($errors->has('recaptcha_secret') ? ' is-invalid' : '')  " id="recaptcha_secret"  value="{{ $settings->recaptcha_secret }}"    name="recaptcha_secret"  >
  
    {!! $errors->first('recaptcha_secret', '<div class="invalid-feedback">:message</div>') !!}
</div>





        <button type="submit" class="btn btn-primary w-100 mt-5">Submit</button>
  

                        </form>
                         