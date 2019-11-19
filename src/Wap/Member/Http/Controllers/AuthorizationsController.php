<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/19
 * Time: 10:55
 */

namespace ChameleonW\LaravelShop\Wap\Member\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ChameleonW\LaravelShop\Wap\Member\Models\User;

class AuthorizationsController extends Controller
{
    public function wechatStore(Request $request) {
        $wechatUser = session('wechat.oauth_user.default');
        $user = User::where("weixin_openid", $wechatUser->id)->first();

        if (!$user) {
            $user = User::create([
                "nickname"      => $wechatUser->name,
                "weixin_openid" => $wechatUser->id,
                "image_head"    => $wechatUser->avatar
            ]);
        }
        // 登入状态-改变
        //改变用户的状态 设置为登入
        Auth::guard('member')->login($user);
        var_dump(Auth::guard('member')->check());
        return '通过';
    }

}