<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\PropertyType;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    const LOCK_STATUS = 1;
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
        view()->Composer('user.layouts.header', function($view){
            $category = Category::all();
            // $property_type = PropertyType::where('status',self::LOCK_STATUS)->get();
            $view->with('category',$category);
        });
        view()->Composer('user.layouts.header', function($view){
            // $category = Category::all();
            $property_type = PropertyType::where('status',self::LOCK_STATUS)->get();
            $view->with('property_type',$property_type);
        });
    }
}
