<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Auth;
use Session;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('impersonate', function(){
            if(Session()->get('impersonate')){
                return true;
            }
            return false;
        });
    }
}
