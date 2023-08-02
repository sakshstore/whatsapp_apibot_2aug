<?php $__env->startSection('template_title'); ?>
    Mass Message
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
              
                     

                            <span id="card_title">
                                <?php echo e(__('Mass Message')); ?>

                            </span>

                             <div class="float-right">
                                <a href="<?php echo e(route('mass-messages.create')); ?>" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  <?php echo e(__('Create New')); ?>

                                </a>
                              </div>
                   
                  
 
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									
										<th>Message</th>
										<th>Status</th>	<th>Customer Tags</th>
										<th>Scheduled At</th>
									 

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $massMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $massMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($massMessage->id); ?></td>
                                            
										
											
	 	<td>
	 	    
	 	       
   <?php echo e($massMessage->title); ?>


 

 	 	                 

	 	</td>
	 		 		 		 		 	
	 		 		 		 		 	
											<td><?php echo e($massMessage->status); ?></td>
												<td><?php echo e($massMessage->customer_tags); ?></td>
											
											<td><?php echo e($massMessage->scheduled_at); ?></td>
									 

                                            <td>
                                                <form action="<?php echo e(route('mass-messages.destroy',$massMessage->id)); ?>" method="POST">
                                                 
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('mass-messages.edit',$massMessage->id)); ?>"><i class="fa fa-fw fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> <?php echo e(__('Delete')); ?></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                  
                <?php echo $massMessages->links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/mass-message/index.blade.php ENDPATH**/ ?>