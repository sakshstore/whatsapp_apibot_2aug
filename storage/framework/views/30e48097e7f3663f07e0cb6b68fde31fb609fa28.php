<!doctype html>

 

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"    data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     

  
  
  
      
            <?php echo $__env->yieldContent('style'); ?> 
          
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md  shadow-sm">
            <div class="container">
                
                 
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
               <img height="100px" src="<?php echo e(env('APP_LOGO')); ?>" alt=""  >     <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                
                
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            
                        <?php else: ?>
                        
                        
                         <li class="nav-item">
                            
                            
                            <form action="<?php echo e(route('search_in_message')); ?>">
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
                                    <a class="nav-link" href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
                                </li>
                                
                                    <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('mass-messages.index')); ?>"><?php echo e(__('Mass messages')); ?></a>
                                </li>
                                
                               
                                
                        <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('notifications')); ?>"><?php echo e(__('Notifications')); ?></a>
                                </li>
                                
                               
                                
                                
                         
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
       
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Admin Menu
          </a>
          <ul class="dropdown-menu">
              
              
               <li >
                                    <a class="dropdown-item"    href="<?php echo e(route('manage_app')); ?>"><?php echo e(__('Manage App')); ?></a>
                                </li>
                                
                                
                                
 <li >
                                    <a class="dropdown-item"    href="<?php echo e(route('templates.index')); ?>"><?php echo e(__('Templates')); ?></a>
                                </li>
                                
                                
                                
                                
                                <li >
                                <a class="dropdown-item"    href="<?php echo e(route('webhook_report')); ?>"><?php echo e(__('Webhook report')); ?></a>
                                </li>
                                
                                
                                
                                
                                
                                   <li  >
                                    <a class="dropdown-item"    href="<?php echo e(route('settings')); ?>"><?php echo e(__('Settings')); ?></a>
                                </li>
                                
                       <li  >
                <a class="dropdown-item"    href="<?php echo e(route('users.index')); ?>"><?php echo e(__('User Management')); ?></a>
                                </li>
                                
 
                     </ul>
        </li>
        
           <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
        
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            
            
             
<div class="container">
    
    
    
    
    
    <div class="row">
        <div class="col-12">
            
            
          <?php if(session('error')): ?>
        
    
            <div class="alert alert-warning" role="alert">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        
        
        
                               
 <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        
            </div>    </div>    </div>
         

        
            <?php echo $__env->yieldContent('content'); ?>
            
           
              
              
              
        </main>
    </div>
    
    
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>


 
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  


       <?php echo $__env->yieldContent('script'); ?>
 
</body>
</html>
<?php /**PATH /home/vikkinbot/laraauth9/resources/views/layouts/app.blade.php ENDPATH**/ ?>