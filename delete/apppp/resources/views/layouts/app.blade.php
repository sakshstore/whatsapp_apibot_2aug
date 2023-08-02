<!doctype html>

 

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"    data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     

  
  
  
      
            @yield('style') 
          
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md  shadow-sm">
            <div class="container">
                
                 
                <a class="navbar-brand" href="{{ url('/') }}">
               <img src="{{ env('APP_LOGO')}}" alt=""  >     {{ config('app.name', 'Laravel') }}
                </a>
                
                
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            
                        @else
                        
                        
                         <li class="nav-item">
                            
                            
                            <form action="{{ route('search_in_message') }}">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="search_query">
      
    </div>
    <div class="col">
      <button type="submit" class="btn btn-primary mb-2">Search</button>
    </div>
  </div>
</form>


 
                                </li> 
                                
                   
                   
                                
                                
                                
                                
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                </li>
                                
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('mass-messages.index') }}">{{ __('Mass messages') }}</a>
                                </li>
                                
                               
                                
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('notifications') }}">{{ __('Notifications') }}</a>
                                </li>
                                
                               
                                
                                
                         
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
       
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Admin Menu
          </a>
          <ul class="dropdown-menu">
              
              
               <li >
                                    <a class="dropdown-item"    href="{{ route('manage_app') }}">{{ __('Manage App') }}</a>
                                </li>
                                
                                <li >
                                <a class="dropdown-item"    href="{{ route('webhook_report') }}">{{ __('Webhook report') }}</a>
                                </li>
                                
                                   <li  >
                                    <a class="dropdown-item"    href="{{ route('settings') }}">{{ __('Settings') }}</a>
                                </li>
                                
                       <li  >
                <a class="dropdown-item"    href="{{ route('users.index') }}">{{ __('User Management') }}</a>
                                </li>
                                
 
                     </ul>
        </li>
        
           <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
        
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            
            
             
<div class="container">
    
    
    
    
    
    <div class="row">
        <div class="col-12">
            
            
          @if (session('error'))
        
    
            <div class="alert alert-warning" role="alert">
                {{ session('error') }}
            </div>
        @endif
        
        
        
                               
 @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
            </div>    </div>    </div>
         

        
            @yield('content')
            
           
              
              
        </main>
    </div>
    
    
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    
    
  
  

       @yield('script')
 
</body>
</html>
