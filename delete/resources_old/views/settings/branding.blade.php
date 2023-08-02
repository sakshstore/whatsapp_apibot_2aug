 
             
              
                
  <form method="POST" action="{{ route('settings_branding') }}"  role="form" enctype="multipart/form-data">
                            @csrf
 
        <div class="form-group  mb-3">
        
  <label for="app_name" class="form-label">App Name</label>
  
  
  <input type="text" class="form-control  ($errors->has('app_name') ? ' is-invalid' : '')  " id="app_name"  value="{{ $settings->app_name }}"    name="app_name"  >
  
    {!! $errors->first('app_name', '<div class="invalid-feedback">:message</div>') !!}
</div>
      
      
      
   
   
        <div class="form-group  mb-3">
        
  <label for="app_url" class="form-label">App URL</label>
  
  
  <input type="text" class="form-control  ($errors->has('app_url') ? ' is-invalid' : '')  " id="app_url"  value="{{ $settings->app_url }}"    name="app_url"  >
  
    {!! $errors->first('app_url', '<div class="invalid-feedback">:message</div>') !!}
</div>



<p>System will log out once you save this </p>

        <button type="submit" class="btn btn-primary w-100 mt-5">Submit</button>
  

                        </form>
                         