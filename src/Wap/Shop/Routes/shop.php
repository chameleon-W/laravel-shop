<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/26
 * Time: 15:08
 */

// 先不解释为什么把Http/routes 移动到 Routes/shop.php
Route::get('/wechat-menu', "WechatMenuController@index");
Route::get('/', function(){
    return "商城的首页";
})->middleware("wechat.oauth");
