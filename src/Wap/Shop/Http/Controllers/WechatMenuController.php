<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/26
 * Time: 15:10
 */

namespace ChameleonW\LaravelShop\Wap\Shop\Http\Controllers;

use ChameleonW\LaravelShop\Wap\Shop\Http\Controllers\Controller;

class WechatMenuController extends Controller
{
    public function index(){
        $buttons = [
            [
                "type" => "view",
                "name" => "嘿！boy",
                "url"  => "http://chameleon-w.natapp1.cc/sixstar/laravel/public/wap/shop"
            ],
            [
                "type" => "view",
                "name" => "百度一下",
                "url"  => "https://www.baidu.com"
            ],
        ];
        return app('wechat.official_account')->menu->create($buttons);
    }
}