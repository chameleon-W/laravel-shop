<?php
    return [
        'auth' => [
            // 事先的动作,为了以后着想
            'controller' =>  \ChamemeonW\LaravelShop\Wap\Member\Http\Controllers\AuthorizationsController::class,
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
                    'model' => \ChamemeonW\LaravelShop\Wap\Member\Models\User::class
                ],
            ],
        ],
    ];