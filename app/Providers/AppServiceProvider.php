<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\View;
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
        view::share('categories', Category::where('status', true)->get());
        view::share('Products', Product::where('status', true)->orderBy('name', 'ASC')->get());
        // view::share('customers', Customer::latest()->orderBy('name', 'ASC')->get());
    }
}
