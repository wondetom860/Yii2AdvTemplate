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
        'user' => [
            // 'class' => 'common\models\User',
            'identityClass' => 'common\models\User',
            'loginUrl'=>['/site/login'],
            'enableAutoLogin' => false,
            'authTimeout' => 1000,  //Number of second to Automatic Logout if inactive
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => false],
        ],
        // 'assetManager' => [
        //     'appendTimestamp' => true,
        // ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
    ],
];
