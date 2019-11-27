<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/27
 * Time: 14:48
 */

namespace ChameleonW\LaravelShop\Wap\Shop\Http\Controllers;


class IndexController extends Controller
{
    public function index(){
        return view('wap.shop::index.index');
    }
}