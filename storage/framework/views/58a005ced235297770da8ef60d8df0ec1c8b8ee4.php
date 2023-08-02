 
             
             
                        <span class="header">Pusher Key</span>
                
  <form method="POST" action="<?php echo e(route('settings_pusher')); ?>"  role="form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            
 
        
      
        <div class="form-group  mb-3">
        
  <label for="pusher_app_id" class="form-label">Pusher app id</label>
  
  
  <input type="text" class="form-control  ($errors->has('pusher_app_id') ? ' is-invalid' : '')  " id="pusher_app_id"  value="<?php echo e($settings->pusher_app_id); ?>"    name="pusher_app_id"  >
  
    <?php echo $errors->first('pusher_app_id', '<div class="invalid-feedback">:message</div>'); ?>

</div>
      
      
      
      
       <div class="form-group  mb-3">
        
  <label for="pusher_app_key" class="form-label">Pusher app key</label>
  
  
  <input type="text" class="form-control  ($errors->has('pusher_app_key') ? ' is-invalid' : '')  " id="pusher_app_key"  value="<?php echo e($settings->pusher_app_key); ?>"    name="pusher_app_key"  >
  
    <?php echo $errors->first('pusher_app_key', '<div class="invalid-feedback">:message</div>'); ?>

</div>

      
       <div class="form-group  mb-3">
        
  <label for="pusher_app_secret" class="form-label">pusher_app_secret</label>
  
  
  <input type="text" class="form-control  ($errors->has('pusher_app_secret') ? ' is-invalid' : '')  " id="pusher_app_secret"  value="<?php echo e($settings->pusher_app_secret); ?>"    name="pusher_app_secret"  >
  
    <?php echo $errors->first('pusher_app_secret', '<div class="invalid-feedback">:message</div>'); ?>

</div>

      
       <div class="form-group  mb-3">
        
  <label for="pusher_app_cluster" class="form-label">pusher_app_cluster</label>
  
  
  <input type="text" class="form-control  ($errors->has('pusher_app_cluster') ? ' is-invalid' : '')  " id="pusher_app_cluster"  value="<?php echo e($settings->pusher_app_cluster); ?>"    name="pusher_app_cluster"  >
  
    <?php echo $errors->first('pusher_app_cluster', '<div class="invalid-feedback">:message</div>'); ?>

</div>





        <button type="submit" class="btn btn-primary w-100 mt-5">Submit</button>
  

                        </form>
                         <?php /**PATH /home/vikkinbot/laraauth9/resources/views/settings/pusher.blade.php ENDPATH**/ ?>