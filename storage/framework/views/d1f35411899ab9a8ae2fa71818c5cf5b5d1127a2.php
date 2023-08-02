<?php $__env->startSection('template_title'); ?>
    <?php echo e(__('Update')); ?> Mass Message
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container ">
        <div class="row">
            <div class="col-md-12">

         
         
  <span class="card-title"><?php echo e(__('Update')); ?> Mass Message</span>
             
                 
                 
                 
 <form action="<?php echo e(route('add_image_in_mass_messages',$massMessage->id )); ?>"
      class="dropzone"
      id="thumbnail-dropzone">
    
        <?php echo csrf_field(); ?>
      
      
      
</form>
 
 
                         
                         
                 
                 
                 
            </div>
        </div>
    </section>
    
    
    
    



<?php $__env->stopSection(); ?>



    
<?php $__env->startSection('script'); ?>

 
  
 
 
 <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
         
 
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>


<script>
 
   
         
         
         $(".dropzone").dropzone( );
              
      
                         </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/mass-message/add_image.blade.php ENDPATH**/ ?>