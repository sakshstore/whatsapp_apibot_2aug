  
  
        Document <form action="<?php echo e(route('create_documents_message' )); ?>?app_id=<?php echo e($app->id); ?>&chat_requests_id=<?php echo e($chat_requests_id); ?>"
      class="dropzone"
      id="thumbnail-dropzone">
    
        <?php echo csrf_field(); ?>
      
      
      
</form>
 <?php /**PATH /home/vikkinbot/laraauth9/resources/views/includes/send_documents_form.blade.php ENDPATH**/ ?>