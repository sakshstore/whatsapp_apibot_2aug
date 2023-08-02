 
            <form action="<?php echo e(route('settings_logo' )); ?>"
      class="dropzone"
      id="thumbnail-dropzone">
    
        <?php echo csrf_field(); ?>
      
      
      
</form>
 
 
 
 
<?php $__env->startSection('style'); ?>

 
 <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
 
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>



         
 
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>


<script>
 
    $(".dropzone").dropzone( );
              
    </script>
<?php $__env->stopSection(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/settings/logo.blade.php ENDPATH**/ ?>