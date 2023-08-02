<?php $__env->startSection('template_title'); ?>
    <?php echo e(__('Update')); ?> Template
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="  container ">
        <div class="">
            <div class="col-md-12">

              <?php echo e(__('Update')); ?> Template 
                        <form method="POST" action="<?php echo e(route('templates.update', $template->id)); ?>"  role="form" enctype="multipart/form-data">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo csrf_field(); ?>

                           
                           
                           
        <div class="form-group mb-3">
            
            
            
  <input type="text" class="form-control" id="name" name="name" value="<?php echo e($template->name); ?>" required="">
                   <?php echo $errors->first('name', '<div class="invalid-feedback">:message</div>'); ?>      
                      
                       </div>
    
           
          
          
              <div class="form-group mt-3 mb-3">
            
            
               <textarea class="form-control editor"   id="message" name="message"  >
 <?php echo e($template->message); ?>

</textarea>
            
 
                   <?php echo $errors->first('message', '<div class="invalid-feedback">:message</div>'); ?>      
                      
                       </div>
    
    
    
    
     
             
  <button type="submit" class="btn btn-primary mt-3 mb-3"><?php echo e(__('Submit')); ?></button> 
  
  
  
  
                        </form>
                     
                </div>
            </div>
        </div>
   
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
 
<script>
    ClassicEditor
        .create(document.querySelector('#message'))
        .then(editor => { console.log(editor); })
        .catch(error => { console.error(error); });
        
        
         
        
        
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/template/edit.blade.php ENDPATH**/ ?>