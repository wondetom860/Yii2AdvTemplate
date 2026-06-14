<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],
        'pusher' => [
            'class' => 'br0sk\pusher\Pusher',
            'appId' => '8475',
            'appKey' => 'tay8475',
            'appSecret' => 'tay@8475',
            'options' => [
                'cluster' => 'TAY',
                'encrypted' => true,
            ],
        ],
        'keyGen' => [
            'class' => 'common\components\keyGenerator',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6380,
            'database' => 0,
            'useSSL' => true,
            // Use contextOptions for more control over the connection (https://www.php.net/manual/en/context.php), not usually needed
            // 'contextOptions' => [
            //     'ssl' => [
            //         'local_cert' => '/path/to/local/certificate',
            //         'local_pk' => '/path/to/local/private_key',
            //     ],
            // ],
        ],
        'user' => [
            // 'class' => 'common\models\User',
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\User',
            'loginUrl' => ['/site/login'],
            'enableAutoLogin' => false,
            'authTimeout' => 1000,  //Number of second to Automatic Logout if inactive
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => false],
        ],
        // 'assetManager' => [
        //     'appendTimestamp' => true,
        // ],
    ],
];
