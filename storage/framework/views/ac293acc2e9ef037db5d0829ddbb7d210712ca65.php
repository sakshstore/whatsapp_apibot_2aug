<?php $__env->startSection('content'); ?>

  
 
<div class="container">
    
   
    
    
    <h2   class="mt-5  mb-5">Message count data</h2> 
    
    
    
    
    
    <div class="row">
        <div class="col-12">
               
                      
 
           <table class="table" >
               
               
               
     <tr> <td>Data</td><td>Total Message</td></tr>
           
                 <?php $__currentLoopData = $messages_count_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message_count_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                 
                 <tr>
                     
                     
                  
    
    <td> <?php echo e($message_count_data->date); ?>  </td> 
    
    <td> <?php echo e($message_count_data->messages_count); ?>  </td> 
   
   
    
   
    
     
           
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              
                    </table>
                    
                  
                    
                    
           <table class="table" >
               
               
               
     <tr> <td>Data</td><td>Total Message</td></tr>
           
                 <?php $__currentLoopData = $chat_requests_count_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat_request_count_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                 
                 <tr>
                     
                     
                  
    
    <td> <?php echo e($chat_request_count_data->from_number); ?>  </td> 
    
    <td> <?php echo e($chat_request_count_data->app_id); ?>  </td> 
   
   
    
   
    
     
           
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              
                    </table>
                    
               


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/home.blade.php ENDPATH**/ ?>