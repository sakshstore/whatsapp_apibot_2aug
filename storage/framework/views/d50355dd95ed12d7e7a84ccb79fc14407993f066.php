 
             
              
                
  <form method="POST" action="<?php echo e(route('settings_branding')); ?>"  role="form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
 
        <div class="form-group  mb-3">
        
  <label for="app_name" class="form-label">App Name</label>
  
  
  <input type="text" class="form-control  ($errors->has('app_name') ? ' is-invalid' : '')  " id="app_name"  value="<?php echo e($settings->app_name); ?>"    name="app_name"  >
  
    <?php echo $errors->first('app_name', '<div class="invalid-feedback">:message</div>'); ?>

</div>
      
      
      
   
   
        <div class="form-group  mb-3">
        
  <label for="app_url" class="form-label">App URL</label>
  
  
  <input type="text" class="form-control  ($errors->has('app_url') ? ' is-invalid' : '')  " id="app_url"  value="<?php echo e($settings->app_url); ?>"    name="app_url"  >
  
    <?php echo $errors->first('app_url', '<div class="invalid-feedback">:message</div>'); ?>

</div>



<p>System will log out once you save this </p>

        <button type="submit" class="btn btn-primary w-100 mt-5">Submit</button>
  

                        </form>
                         <?php /**PATH /home/vikkinbot/laraauth9/resources/views/settings/branding.blade.php ENDPATH**/ ?>