<?php $__env->startSection('template_title'); ?>
    <?php echo e($template->name ?? "{{ __('Show') Template"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="  container ">
        <div class="row">
            <div class="col-md-12">
                 
                            <span class="card-title"><?php echo e(__('Show')); ?> Template</span>
                               <br/>   <br/>
                            <a class="btn btn-primary" href="<?php echo e(route('templates.index')); ?>"> <?php echo e(__('Back')); ?></a>
                             <br/>
                               <br/>
                            <?php echo e($template->name); ?>

                        
                        
                      
                        <br/>
                        <br/>
                        
                           
                            <?php echo e($template->message); ?>

                            
                              <hr />
                       
                </div>
            </div>
        </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/template/show.blade.php ENDPATH**/ ?>