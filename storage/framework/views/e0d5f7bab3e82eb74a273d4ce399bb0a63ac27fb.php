  
       <form id="postForm" name="postForm" class="form-horizontal">
      
      
          <input type="hidden" name="app_id" value="<?php echo e($app->id); ?>">
           <input type="hidden" name="chat_requests_id" value="<?php echo e($chat_requests_id); ?>">
           
           
            <div class="form-group  mb-2">
                <label for="message" class="  control-label">Image</label>
               
                    <input type="text" class="form-control" id="message" name="message" value="" required="">
                       </div>
    
      
     <div class="form-group mb-2">
        
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Send Image
             </button>
                   </div>
        </form><?php /**PATH /home/vikkinbot/laraauth9/resources/views/includes/send_message.blade.php ENDPATH**/ ?>