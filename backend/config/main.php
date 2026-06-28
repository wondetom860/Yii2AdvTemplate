<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [

    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'aliases' => [
        '@mdm/admin' => '@backend/extensions/mdmsoft/yii2-admin',
        '@npm'   => '@vendor/npm-asset',
        // for example: '@mdm/admin' => '@app/extensions/mdm/yii2-admin-2.0.0',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            'class' => 'yii\redis\Session',
            'redis' => 'redis', // Points to the 'redis' component above

            // Optional: Customize your session settings
            'name' => 'ADV_LTE_YII2_WT', // Custom browser cookie name
            'timeout' => (86400 / 2),            // Session expiration in seconds (e.g., 24 hours)

            'cookieParams' => [
                'httpOnly' => true,        // Mitigates XSS cookie theft
                'secure' => true,          // Force true if using HTTPS/SSL
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'admin' => [
            'class' => '@mdmadmin/Module',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [],
        ],
        // 'assetManager' => [
        //     'appendTimestamp' => true,
        // ],
        'view' => [
            'theme' => [
                'basePath' => '@webroot/themes/adminlte/src',
                'baseUrl' => '@web/themes/adminlte/src',
                'pathMap' => [
                    '@app/views' => [
                        '@webroot/themes/adminlte/src/views',
                        '@webroot/themes/adminlte/src/views/layouts',
                    ],
                ],
            ],
        ],
    ],

    'params' => $params,
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            // 'fileMap' => [
            //     // 'main' => 'main.php',
            // ],
        ],
        'LICMAN' => [
            'class' => 'backend\modules\licman\LICMan',
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'gii/*',
            'user/*',
            'admin/*',
            'site/*',
            'LICMAN/*'
        ]
    ],
];
