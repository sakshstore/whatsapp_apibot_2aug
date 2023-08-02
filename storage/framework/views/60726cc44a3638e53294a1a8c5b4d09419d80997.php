 
             
             
                        <span class="header">API key</span>
                
  <form method="POST" action="<?php echo e(route('settings_api_key')); ?>"  role="form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            
 
        
        <div class="form-group  mb-3">
        
  <label for="api_key" class="form-label">API key</label>
  
  
  <input type="text" class="form-control  ($errors->has('api_key') ? ' is-invalid' : '')  " id="api_key" readonly  value="<?php echo e($settings->api_key); ?>"    name="api_key"  >
  
    <?php echo $errors->first('api_key', '<div class="invalid-feedback">:message</div>'); ?>

</div>
      
       



        <button type="submit" class="btn btn-primary w-100 mt-5  mb-3">Generate a new Key</button>
  

                        </form>
                        
                        Api sample code
                        
                        
                       <script src="https://gist.github.com/sakshstore/2cf0bf3248fe1e8b7f399fede2a0388e.js"></script>
                         <?php /**PATH /home/vikkinbot/laraauth9/resources/views/settings/api_key.blade.php ENDPATH**/ ?>