<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/26
 * Time: 15:35
 */

namespace ChameleonW\LaravelShop\Wap\Member;

use Illuminate\Support\Facades\Auth;
class Member extends Auth
{
    public function guard(){
        return Auth::guard(config('wap.member.guard'));
    }

    public function __call($name, $arguments)
    {
        return $this->guard()->$name(...$arguments);
    }
}