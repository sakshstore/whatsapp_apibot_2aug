 
             
             
                        <span class="header">Chat gpt auth key</span>
                
  <form method="POST" action="<?php echo e(route('settings_chat_gpt_auth_key')); ?>"  role="form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            
 
        
        <div class="form-group  mb-3">
        
  <label for="chat_gpt_auth_key" class="form-label">Chat gpt auth key</label>
  
  
  <input type="text" class="form-control  ($errors->has('chat_gpt_auth_key') ? ' is-invalid' : '')  " id="chat_gpt_auth_key"  value="<?php echo e($settings->chat_gpt_auth_key); ?>"    name="chat_gpt_auth_key"  >
  
    <?php echo $errors->first('chat_gpt_auth_key', '<div class="invalid-feedback">:message</div>'); ?>

</div>
      
       



        <button type="submit" class="btn btn-primary w-100 mt-5">Submit</button>
  

                        </form>
                         <?php /**PATH /home/vikkinbot/laraauth9/resources/views/settings/chat_gpt.blade.php ENDPATH**/ ?>