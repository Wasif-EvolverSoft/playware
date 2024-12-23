<?php

namespace App\Providers;

use App\Models\Categories;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $categories = Categories::with('children')->whereNull('parent_id')->get();
            $view->with('categories', $categories);
        });
    }
}
