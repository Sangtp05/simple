<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Services\BreadcrumbService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(BreadcrumbService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $parentCategories = Category::whereNull('parent_id')
                ->with('children')
                ->get();
            $view->with('parentCategories', $parentCategories);
        });

        View::composer('components.header', function ($view) {
            $categories = Category::with('children')
                ->whereNull('parent_id')
                ->get();
            $view->with('categories', $categories);
        });
    }
}
