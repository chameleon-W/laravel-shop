<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/19
 * Time: 10:49
 */

namespace ChameleonW\LaravelShop\Wap\Member\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use Notifiable;

    protected $table = "sys_user";

    protected $fillable = [
        'nick_name', 'weixin_openid', 'image_head',
    ];
}