<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$webRoot = dirname(dirname(__DIR__));
$config = [
    'id' => 'SmartTraining',
    'version' => '0.0.1',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'vendorPath' => $webRoot.'/vendor',
    'runtimePath' => $webRoot.'/runtime',
    'timeZone' => 'Asia/Tashkent',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@pcore'   => '@vendor/pcore',
        '@access' => '@vendor/access',
        '@activate' => '@vendor/groups-activate',
        '@charts' => '@vendor/charts',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
        ],
    ],
    'language' => 'uz',
    'components' => [

        'i18n' => [
            'translations' => [
                "app" => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceLanguage' => 'uz-UZ',
                ],
            ],
        ],


        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'eI2dYrXHlPlFc_YgR1xoBLJrMST0eEaI',
            'class' => 'app\components\RequestManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'class' => 'app\components\LangUrlManager',
            'rules' => [
                'help?' => '/admin/default/help',
                'lock' => '/admin/sign/lock',
                'sign/in' => '/admin/sign/in',
                'sign/up' => '/admin/sign/up',
                'sign/out' => '/admin/sign/out',
                'profile' => '/admin/my/profile',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>/<group:\d+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>/<item:\w+>/<id:\d+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>/<item:\w+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/view/<id:\d+>' => '<_m>/<_c>/view',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                '<_m:[\w\-]+>' => '<_m>/default/index',
                '<_m:[\w\-]+>/<_a:[\w\-]+>' => '<_m>/default/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
                '<controller>' => '<controller>/index',
                '<controller:\w+>' => '<controller:\w+>/index',
                '<controller>/<action>' => '<controller>/<action>',
                '<controller>/<action:\w+>/*' => '<controller>/<action:\w+>',
                '<controller:\w+>/<action:\w+>/*' => '<controller:\w+>/<action:\w+>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\w+>/<page:\w+>' => '<controller>/<action>',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
    $config['components']['cache']['class'] = 'yii\caching\DummyCache';
}

return $config;
