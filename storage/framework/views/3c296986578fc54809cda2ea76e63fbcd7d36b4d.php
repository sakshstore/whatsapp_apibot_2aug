<?php $__env->startSection('content'); ?>
    <div class="container">
    
   
    
    
    <h2   class="mt-5  mb-5">Setting</h2> 
    
     
    
    <div class="row">
        <div class="col-12">
    
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-brand-tab" data-bs-toggle="pill" data-bs-target="#pills-brand" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Branding Setting</button>
  </li>  
 
 
 <li class="nav-item" role="presentation">
    <button class="nav-link  " id="pills-logo-tab" data-bs-toggle="pill" data-bs-target="#pills-logo" type="button" role="tab" aria-controls="pills-logo" aria-selected="true">Logo Setting</button>
  </li>
  
  
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-notification-tab" data-bs-toggle="pill" data-bs-target="#pills-notification" type="button" role="tab" aria-controls="pills-notification" aria-selected="false">Notification Settings</button>
  </li>  
  
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-recaptcha-tab" data-bs-toggle="pill" data-bs-target="#pills-recaptcha" type="button" role="tab" aria-controls="pills-recaptcha" aria-selected="false">Recaptcha Settings </button>
  </li>
  
  
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Cron Job Settings</button>
  </li>  
  
  
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-api_key-tab" data-bs-toggle="pill" data-bs-target="#pills-api_key" type="button" role="tab" aria-controls="pills-api_key" aria-selected="false">Api key</button>
  </li>  
  
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-chat_gpt_auth_key-tab" data-bs-toggle="pill" data-bs-target="#pills-chat_gpt_auth_key" type="button" role="tab" aria-controls="pills-chat_gpt_auth_key" aria-selected="false">Chat gpt auth key</button>
  </li>
    
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-pusher_key-tab" data-bs-toggle="pill" data-bs-target="#pills-pusher_key" type="button" role="tab" aria-controls="pills-pusher_key" aria-selected="false">pusher_key</button>
  </li>
  
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-brand" role="tabpanel" aria-labelledby="pills-brand-tab" tabindex="0">  <?php echo $__env->make('settings.branding', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>



  <div class="tab-pane fade" id="pills-logo" role="tabpanel" aria-labelledby="pills-logo-tab" tabindex="0">
    <?php echo $__env->make('settings.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    


  <div class="tab-pane fade" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab" tabindex="0">
    <?php echo $__env->make('settings.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    

  <div class="tab-pane fade" id="pills-recaptcha" role="tabpanel" aria-labelledby="pills-recaptcha-tab" tabindex="0">
    <?php echo $__env->make('settings.recaptcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    

  <div class="tab-pane fade" id="pills-api_key" role="tabpanel" aria-labelledby="pills-api_key-tab" tabindex="0">
    <?php echo $__env->make('settings.api_key', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    

  <div class="tab-pane fade" id="pills-chat_gpt_auth_key" role="tabpanel" aria-labelledby="pills-chat_gpt_auth_key-tab" tabindex="0">
    <?php echo $__env->make('settings.chat_gpt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    
  <div class="tab-pane fade" id="pills-pusher_key" role="tabpanel" aria-labelledby="pills-pusher_key-tab" tabindex="0">
    <?php echo $__env->make('settings.pusher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    
    
    
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">Cron Job</div>
 
</div>
 
 
 
 
 </div></div></div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/settings/form.blade.php ENDPATH**/ ?>