<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CocktailService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Enregistrer CocktailService
        $this->app->singleton(CocktailService::class, function ($app) {
            return new CocktailService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
