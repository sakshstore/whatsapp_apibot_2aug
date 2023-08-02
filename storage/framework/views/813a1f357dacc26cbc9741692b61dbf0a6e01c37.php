<?php $__env->startSection('content'); ?>

  
 
<div class="container">
    
   
    
    
    <h2   class="mt-5  mb-5">Notifications</h2> 
    
    
    
    
    
    <div class="row">
        <div class="col-12">
               
                      
 
           <table class="table" >
               
               
               
     
           
                 <?php $__currentLoopData = $unread_notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                 
                 <tr>
                     
                     
                  
   
    <td> <?php echo e($notification->data['message']); ?>  </td> 
    <td> <?php echo e($notification->created_at); ?>  </td> 
   
   
    
   
    
     
           
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              
                    </table>
                    
                    
                    <hr/>
               
   
              
                                      
 
           <table class="table" >
               
                     <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                 
                 <tr>
                      
   
    <td> <?php echo e($notification->data['message']); ?>  </td> 
    <td> <?php echo e($notification->created_at); ?>  </td> 
    
           
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              
                    </table>
           


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/notifications.blade.php ENDPATH**/ ?>