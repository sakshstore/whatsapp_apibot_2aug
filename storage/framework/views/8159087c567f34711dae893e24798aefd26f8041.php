<?php $__env->startSection('template_title'); ?>
    User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
               
                            <span id="card_title">
                                <?php echo e(__('User')); ?>

                            </span>

                             
                                <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  <?php echo e(__('Create New')); ?>

                                </a>
                         
                   

                     
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>User ID</th>
                                        
										<th>Name</th>
									 
										<th>Email</th>

                                        <th>Roles</th>   <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            
                                            		<td><?php echo e($user->id); ?></td>
											<td><?php echo e($user->name); ?></td>
										 	<td><?php echo e($user->email); ?></td>

						  <td>
						      
						      <?php if(isset($user->roles)): ?>
						      
                            <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge bg-primary"><?php echo e($role->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php endif; ?>
                        </td>		 
									 
										 
										
                                            <td>
                                                <form action="<?php echo e(route('users.destroy',$user->id)); ?>" method="POST">
                                                    
                                                    
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('users.edit',$user->id)); ?>"><i class="fa fa-fw fa-edit"></i> <?php echo e(__('Edit')); ?></a>
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
                    
                <?php echo $users->links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/user/index.blade.php ENDPATH**/ ?>