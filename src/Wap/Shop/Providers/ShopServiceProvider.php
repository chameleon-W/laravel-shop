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
        $this->registerPublishing();
    }

    public function boot(){
        $this->loadViewsFrom(__DIR__."/../Resources/views","wap.shop");
    }

    public function registerPublishing(){
        // 判断是否在命令行中运行
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__.'/../Resources/assets' => public_path('vendor/chameleonW/laravel-wap-shop'),
                ],
                'laravel-shop-wap-shop'
            );
        }
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