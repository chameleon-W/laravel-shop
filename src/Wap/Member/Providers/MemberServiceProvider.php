<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/19
 * Time: 10:50
 */

namespace ChameleonW\LaravelShop\Wap\Member\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

class MemberServiceProvider extends ServiceProvider{
    //member组件需要注入的中间件
    protected $routeMiddlewate = [
        'wechat.oauth' => \Overtrue\LaravelWeChat\Middleware\OAuthAuthenticate::class,
    ];

    protected $middlewareGroups = [];

    public function register()
    {
        //注册路由
        $this->registerRoutes();
        //加载config配置文件
        $this->mergeConfigFrom(__DIR__."/../Config/member.php", 'wap.member');
        $this->registerRouteMiddleware();
    }

    public function boot()
    {
        $this->loadMemberAuthConfig();
    }

    public function loadMemberAuthConfig()
    {
        config(Arr::dot(config('wap.member.auth', []), 'auth.'));
    }

    public function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function(){
            $this->loadRoutesFrom(__DIR__."/../Http/routes.php");
        });
    }

    public function registerRouteMiddleware()
    {
        foreach ($this->middlewareGroups as $key=>$middleware) {
            $this->app['router']->middlewareGroup($key, $middleware);
        }

        foreach ($this->routeMiddlewate as $key=>$middleware) {
            $this->app['router']->aliasMiddleware($key, $middleware);
        }
    }

    public function routeConfiguration()

    {
        return [
            'namespace'  => 'ChamemeonW\LaravelShop\Wap\Member\Http\Controllers',
            'prefix'     => 'wap/member',
            'middlewate' => 'web',
        ];
    }
}