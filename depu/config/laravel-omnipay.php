<?php

return [

    // 默认支付网关
    'default' => 'alipay',

    // 各个支付网关配置
    'gateways' => [
        'paypal' => [
            'driver' => 'PayPal_Express',
            'options' => [
                'solutionType' => '',
                'landingPage' => '',
                'headerImageUrl' => ''
            ]
        ],

        'alipay_app' => [
            'driver' => 'Alipay_AopApp',
            'options' => [
                'appId'       => '2017061507498154',
                'signType'    =>'RSA2',
                'returnUrl'   => 'http://dpkyb.zpftech.com/api/pay/alipay/callback',
                'notifyUrl'   => 'http://dpkyb.zpftech.com/api/pay/alipay/callback',
                'privateKey'  => file_get_contents(base_path('storage/app/certs/alipay/rsa_private_key.pem')),
                'publicKey'   => file_get_contents(base_path('storage/app/certs/alipay/rsa_public_key.pem')),
            ]
        ],

        'alipay_pc' => [
            'driver' => 'Alipay_AopPage',
            'options' => [
                'appId'       => '2017061507498154',
                'signType'    =>'RSA2',
                'returnUrl'   => 'http://dpkyb.zpftech.com/api/pay/alipay/callback',
                'notifyUrl'   => 'http://dpkyb.zpftech.com/api/pay/alipay/callback',
                'privateKey'  => file_get_contents(base_path('storage/app/certs/alipay/rsa_private_key.pem')),
                'publicKey'   => file_get_contents(base_path('storage/app/certs/alipay/rsa_public_key.pem')),
            ]
        ],

        'wechatpay_app' => [
            'driver' => 'WechatPay_App',
            'options' => [
                'appId'     => 'wxd678efh567hg6787',
                'mchId'     => '1230000109',
                'apiKey'    => 'your appid here',
                'returnUrl' => 'your returnUrl here',
                'notifyUrl' => 'your notifyUrl here',
            ]
        ],

        'wechatpay_pc' => [
            'driver' => 'WechatPay_Native',
            'options' => [
                'appId'     => 'wxd678efh567hg6787',
                'mchId'     => '1230000109',
                'apiKey'    => 'your appid here',
                'returnUrl' => 'your returnUrl here',
                'notifyUrl' => 'your notifyUrl here',
            ]
        ],

        'wechatpay_callback' => [
            'driver' => 'WechatPay',
            'options' => [
                'appId'     => 'wxd678efh567hg6787',
                'mchId'     => '1230000109',
                'apiKey'    => 'your appid here',
                'returnUrl' => 'your returnUrl here',
                'notifyUrl' => 'your notifyUrl here',
            ]
        ],

        'unionpay' => [
            'driver' => 'UnionPay_Express',
            'options' => [
                'merId'        => '777290058148267',
                'certPath'     => storage_path('app/certs/unionpay/private_key.p12'),
                'certPassword' => '000000',
                'certDir'      => storage_path('app/certs/unionpay'),
                'returnUrl'    => 'http://dpkyf.zpftech.com/my_ser/order/1/pay_results',
                'notifyUrl'    => env('APP_URL') . '/api/pay/unionpay/callback',
            ]
        ],
    ]

];