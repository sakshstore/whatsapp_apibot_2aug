@extends('layouts.app')

@section('content')
   
   <div class="container">
    
   
      
    <div class="row">
        
         <div class="col-md-12">
             
             
             
                    <div class="title">{{ __('Login With OTP') }}</div>

                  
                        
                        <form id="saksh_recaptcha_form"    method="POST" action="{{ route('login_with_otp') }}">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="email"
                                       class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                
                                    
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                           
                           
 
 <input type="hidden" name="grecaptcha_token" />
                            
                            

                        

                            <div class="form-group mb-1">
                             
                                    
                                 
                           <button id="submit_btn"  class="btn btn-primary">
                                        {{ __('Send OTP') }}
                                    </button>
                          
                            </div>
                        </form>
                      
                      
                      
                          </div>    </div>    </div>  
@endsection
