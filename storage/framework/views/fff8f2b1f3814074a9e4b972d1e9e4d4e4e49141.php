<?php $__env->startSection('content'); ?>
   
   
   
   <div class="container">
    
   
      
    <div class="row">
        
         <div class="col-md-12">
             
             
                    <div class="title"><?php echo e(__('Login With OTP')); ?></div>

                  
                        
                        <form id="saksh_recaptcha_form"  method="POST" action="<?php echo e(route('verify_login_with_otp')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group  mb-2">
                                <label for="otp"
                                       class="col-form-label text-md-right"><?php echo e(__('OTP')); ?></label>

                                  
       <input   type="hidden" name="email"  value="<?php echo e($email); ?>" >

 <input type="hidden" name="grecaptcha_token" />
                                    
                                    <input id="otp" type="text"
                                           class="form-control " name="otp"
                                           value="" required  autofocus>

                                   
                                </div>
                           
                           
 
                            
                            

                           
                           

                            <div class="form-group mb-2">
                             
                                    
                                   
                             
                           <button id="submit_btn"  class="btn btn-primary">
                                        <?php echo e(__('Verify')); ?>

                                    </button>
                          
                            </div>
                        </form>
                        
                        
                          </div>    </div>    </div>  
                          
                          
                          
                          <?php $__env->stopSection(); ?>
    
<?php $__env->startSection('script'); ?>



                           <script src="https://www.google.com/recaptcha/api.js?render=6Lc5rhclAAAAADbrKwWHtywvsIW3V-WiqnvMqhSC"></script>
          
          
                              <script>
  
  
  $( "#submit_btn" ).click(function(e) {
  
     
      
   e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6Lc5rhclAAAAADbrKwWHtywvsIW3V-WiqnvMqhSC', {action: 'submit'}).then(function(token) {
               
               
                 $('input[name="grecaptcha_token"]').val(token);
                 
                 
              console.log(token);
             document.getElementById("saksh_recaptcha_form").submit(); 
              
              // Add your logic to submit to your backend server here.
          });
        });
});


 
  
 
          
 
  
 
   
  </script>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/auth/verify_otp_for_login.blade.php ENDPATH**/ ?>