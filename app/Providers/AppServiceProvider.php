<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema; // add
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;

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
        $category = Category::orderBy('id_cate', 'ASC')->get();
        View::share(compact('category'));
        Schema::defaultStringLength(191); // add: default varchar(191)
    }
}