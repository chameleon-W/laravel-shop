<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/26
 * Time: 15:32
 */
namespace ChameleonW\LaravelShop\Wap\Member\Facades;

use Illuminate\Support\Facades\Facade;

class Member extends Facade
{
    protected static function getFacadeAccessor(){
        return \ChameleonW\LaravelShop\Wap\Member\Member::class;
    }
}