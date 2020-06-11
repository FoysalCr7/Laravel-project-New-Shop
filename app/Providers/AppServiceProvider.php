<?php

namespace App\Providers;
use View;
use App\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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

       View::composer('front-end.includes.header',function ($view)
       {$view->with('category',Category::where('publication_status',1)->get());
       });
        Schema::defaultStringLength(191);
    }
}
