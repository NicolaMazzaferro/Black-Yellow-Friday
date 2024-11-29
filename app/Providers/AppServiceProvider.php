<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\AdminMiddleware;

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
        // Condividi le categorie con tutte le viste
        View::composer('*', function ($view) {
            $categories = Cache::remember('categories', now()->addHours(1), function () {
                return Category::all();
            });
            $view->with('categories', $categories);
        });

        // Registra il middleware 'admin' come alias
        Route::aliasMiddleware('admin', AdminMiddleware::class);
    }
}
