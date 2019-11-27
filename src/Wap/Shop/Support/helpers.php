<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/27
 * Time: 16:07
 */

if (! function_exists('shop_asset')) {
    function shop_asset($path, $secure=null) {
        $path = "vendor/chameleonW/laravel-wap-shop\\".$path;
        return asset($path, $secure);
    }
}