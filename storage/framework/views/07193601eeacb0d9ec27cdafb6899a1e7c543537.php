<?php $__env->startSection('content'); ?>
   
   
   
          
   <div class="container">
    
   
      
    <div class="row">
        
         <div class="col-md-12">
             
             
             
                    <div class="title"><?php echo e(__('Login With OTP')); ?></div>

                  
                        
                        <form id="saksh_recaptcha_form"    method="POST" action="<?php echo e(route('login_with_otp')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group mb-2">
                                <label for="email"
                                       class="col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                                
                                    
                                    <input id="email" type="email"
                                           class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                           value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                           
                           
 
 <input type="hidden" name="grecaptcha_token" />
                            
                            

                        

                            <div class="form-group mb-1">
                             
                                    
                                 
                           <button id="submit_btn"  class="btn btn-primary">
                                        <?php echo e(__('Send OTP')); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vikkinbot/laraauth9/resources/views/auth/login_with_otp.blade.php ENDPATH**/ ?>