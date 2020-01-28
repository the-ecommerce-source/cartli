<?php

namespace TES\Cartli;  
use Illuminate\Support\ServiceProvider;
class CartliServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    public function register()
    {

    }
}