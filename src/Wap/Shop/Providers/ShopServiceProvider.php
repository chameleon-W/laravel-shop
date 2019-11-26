<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/26
 * Time: 15:04
 */

namespace ChameleonW\LaravelShop\Wap\Shop\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


class ShopServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerRoutes();
    }

    public function boot(){

    }

    public function registerRoutes(){
        Route::group($this->routeConfiguration(), function() {
            $this->loadRoutesFrom(__DIR__."/../Routes/shop.php");
        });
    }

    public function routeConfiguration(){
        return [
            'namespace'  => 'ChameleonW\LaravelShop\Wap\Shop\Http\Controllers',
            'prefix'     => 'wap/shop',
            'middleware' => 'web'
        ];
    }
}