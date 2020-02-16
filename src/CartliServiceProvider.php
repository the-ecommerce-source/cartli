<?php

namespace TES\Cartli;  
use Illuminate\Support\ServiceProvider;
class CartliServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/cartli.php', 'cartli');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'cartli');
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\Admin::class
            ]);
        }
        
        $this->publishes([
			__DIR__ . '/../resources/assets/css' => public_path('css'),
			__DIR__. '/../resources/assets/js' => public_path('js'),
		], 'public');
    }

    public function register()
    {

    }
}