 
             
             
                        <span class="header">Notification Settings</span>
                
  <form method="POST" action="<?php echo e(route('settings_notifications')); ?>"  role="form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            
 
        
        <div class="form-group  mb-3">
        
  <label for="host" class="form-label">Host</label>
  
  
  <input type="text" class="form-control  ($errors->has('host') ? ' is-invalid' : '')  " id="host"  value="<?php echo e($settings->host); ?>"    name="host"  >
  
    <?php echo $errors->first('host', '<div class="invalid-feedback">:message</div>'); ?>

</div>
      
        <div class="form-group  mb-3">
        
  <label for="port" class="form-label">Port</label>
  
  
  <input type="text" class="form-control  ($errors->has('port') ? ' is-invalid' : '')  " id="port"  value="<?php echo e($settings->port); ?>"    name="port"  >
  
    <?php echo $errors->first('port', '<div class="invalid-feedback">:message</div>'); ?>

</div>


           
  
        <div class="form-group  mb-3">
        
  <label for="username" class="form-label">Username</label>
  
  
  <input type="text" class="form-control  ($errors->has('username') ? ' is-invalid' : '')  " id="username"  value="<?php echo e($settings->username); ?>"    name="username"  >
  
    <?php echo $errors->first('username', '<div class="invalid-feedback">:message</div>'); ?>

</div>

        <div class="form-group  mb-3">
        
  <label for="password" class="form-label">Password</label>
  
  
  <input type="text" class="form-control  ($errors->has('password') ? ' is-invalid' : '')  " id="password"  value="<?php echo e($settings->password); ?>"    name="password"  >
  
    <?php echo $errors->first('password', '<div class="invalid-feedback">:message</div>'); ?>

</div>

        <div class="form-group  mb-3">
        
  <label for="encryption" class="form-label">Encryption</label>
  
  
  <input type="text" class="form-control  ($errors->has('encryption') ? ' is-invalid' : '')  " id="encryption"  value="<?php echo e($settings->encryption); ?>"    name="encryption"  >
  
    <?php echo $errors->first('encryption', '<div class="invalid-feedback">:message</div>'); ?>

</div>
        <div class="form-group  mb-3">
        
  <label for="from_address" class="form-label">From Address</label>
  
  
  <input type="text" class="form-control  ($errors->has('from_address') ? ' is-invalid' : '')  " id="from_address"  value="<?php echo e($settings->from_address); ?>"    name="from_address"  >
  
    <?php echo $errors->first('from_address', '<div class="invalid-feedback">:message</div>'); ?>

</div>




<div class="form-group  mb-3">
        
  <label for="from_name" class="form-label">From Name</label>
  
  
  <input type="text" class="form-control  ($errors->has('from_name') ? ' is-invalid' : '')  " id="from_name"  value="<?php echo e($settings->from_name); ?>"    name="from_name"  >
  
    <?php echo $errors->first('from_name', '<div class="invalid-feedback">:message</div>'); ?>

</div>

           

  
        <button type="submit" class="btn btn-primary w-100 mt-5">Submit</button>
  

                        </form>
                         <?php /**PATH /home/vikkinbot/laraauth9/resources/views/settings/notification.blade.php ENDPATH**/ ?>