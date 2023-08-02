<?php $__env->startSection('content'); ?>

  <style>
 
 td {
  white-space: normal !important; 
  word-wrap: break-word;  
}
table {
  table-layout: fixed;
}
  </style>
 
<div class="container">
    
   
    
    
    <h2   class="mt-5  mb-5">Webhook report [Latest 50 Only] </h2> 
    
    
    
    
    
    <div class="row">
        <div class="col-12">
               
                      
 
           <table class="table" >
               
               
               
     
           
                 <?php $__currentLoopData = $webhook_reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webhook_report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                 
                 <tr>
                     
                     
                  
   
    <td> <?php echo e($webhook_report->data); ?>  </td> 
    <td> <?php echo e($webhook_report->created_at); ?>  </td> 
   
   
    
   
    
     
           
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              
                    </table>
                    
                    
         
               
   
              
                                      
  
           


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/webhook_report.blade.php ENDPATH**/ ?>