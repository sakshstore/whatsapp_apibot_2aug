<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        
        Paginator::useBootstrap();
                
                
                
            Http::macro('whatsapp', function () {
                
   
 
    
 return Http::withToken('EAAHIFF1lhZBIBAP4CflcDv3fnbNRSSu2Dbq677PSmax1UCf1lLvaZCbZAda5JPD9hjtJodARZB2n13TTgZCcQZAPUhLqVjUzFRxAxBEmjIqS96shyu53hdlk7QZCVFPb7eM3HVbYE1aPGr6ofa0O2F6w5MvnNf0ZB0Vj1sRZApZBpYE7SfCKDY0NyUof1dtoPLdMmOt0El8K1997sGtrggglXM')->baseUrl('https://graph.facebook.com/v15.0/' );
     
     
     
            });
    
     
     
     
    }
}
