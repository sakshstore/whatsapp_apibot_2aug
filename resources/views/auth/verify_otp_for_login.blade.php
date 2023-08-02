@extends('layouts.app')

@section('content')
   
   
   
   <div class="container">
    
   
      
    <div class="row">
        
         <div class="col-md-12">
             
             
                    <div class="title">{{ __('Login With OTP') }}</div>

                  
                        
                        <form id="saksh_recaptcha_form"  method="POST" action="{{ route('verify_login_with_otp') }}">
                            @csrf

                            <div class="form-group  mb-2">
                                <label for="otp"
                                       class="col-form-label text-md-right">{{ __('OTP') }}</label>

                                  
       <input   type="hidden" name="email"  value="{{$email}}" >

 <input type="hidden" name="grecaptcha_token" />
                                    
                                    <input id="otp" type="text"
                                           class="form-control " name="otp"
                                           value="" required  autofocus>

                                   
                                </div>
                           
                           
 
                            
                            

                           
                           

                            <div class="form-group mb-2">
                             
                                    
                                   
                             
                           <button id="submit_btn"  class="btn btn-primary">
                                        {{ __('Verify') }}
                                    </button>
                          
                            </div>
                        </form>
                        
                        
                          </div>    </div>    </div>  
                          
                          
                          
                          @endsection
    
@section('script')



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
  
@endsection
