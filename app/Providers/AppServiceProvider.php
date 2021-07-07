<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\CartComposer;
use App\Models\Category;
use App\Models\Subcategory;
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
     
        View::composer('*', function($view) {

            $view->with('categories', Category::with('subcategories')->get());
    
        });

        View::composer('*', CartComposer::class);
        View::composer('order.store', CartComposer::class);

        Paginator::useBootstrap();

    }
}
