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
use ChamemeonW\LaravelShop\Wap\Member\Models\User;

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
        return '通过';
    }

}