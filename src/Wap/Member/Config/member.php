<?php
    return [
        'wechat' => [
            'official_account' => [
                'default' => [
                    'app_id' => env('WECHAT_OFFICIAL_ACCOUNT_APPID', 'chameleon-w-appid'),         // AppID
                    'secret' => env('WECHAT_OFFICIAL_ACCOUNT_SECRET', 'chameleon-w-secret'),    // AppSecret
                    'token' => env('WECHAT_OFFICIAL_ACCOUNT_TOKEN', 'chameleon-w-token'),           // Token
                    'aes_key' => env('WECHAT_OFFICIAL_ACCOUNT_AES_KEY', ''),                 // EncodingAESKey
                    'oauth' => [
                        'scopes'   => array_map('trim', explode(',', env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_SCOPES', 'snsapi_userinfo'))),
                        'callback' => env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_CALLBACK', '/examples/oauth_callback.php'),
                    ],
                ],
            ],
        ],
        'auth' => [
            // 事先的动作,为了以后着想
            'controller' =>  \ChameleonW\LaravelShop\Wap\Member\Http\Controllers\AuthorizationsController::class,
            // 当前使用的守卫,只是定义
            'guard' => 'member',

            // 定义的是守卫组
            'guards' => [
                'member' => [
                    'driver' => 'session',
                    'provider' => 'member',
                ],
            ],
            'providers' => [
                'member' => [
                    'driver' => 'eloquent',
                    'model' => \ChameleonW\LaravelShop\Wap\Member\Models\User::class
                ],
            ],
        ],
    ];