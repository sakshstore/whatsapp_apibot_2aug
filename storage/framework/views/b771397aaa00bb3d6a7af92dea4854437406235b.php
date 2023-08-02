<?php $__env->startSection('template_title'); ?>
    Template
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
            
                                <?php echo e(__('Template')); ?>

                                
                                <BR />
                          
                                <a href="<?php echo e(route('templates.create')); ?>" class="btn btn-primary btn-sm float-right  mb-5"  data-placement="left">
                                  <?php echo e(__('Create New')); ?>

                                </a>
                              
                  

                    
                                    <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      	<div class="mb-5">
                                            
											<div ><h3><?php echo e($template->name); ?></h3></div>
											<div><?php echo $template->message; ?></div>

                                            <div>
                                                <form action="<?php echo e(route('templates.destroy',$template->id)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="<?php echo e(route('templates.show',$template->id)); ?>"><i class="fa fa-fw fa-eye"></i> <?php echo e(__('Show')); ?></a>
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('templates.edit',$template->id)); ?>"><i class="fa fa-fw fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> <?php echo e(__('Delete')); ?></button>
                                                </form>
                                                
                                                <HR />
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
               
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/template/index.blade.php ENDPATH**/ ?>