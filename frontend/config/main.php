<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'profilemanager' => [
            'class' => 'frontend\modules\profilemanager\Module'
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '',
            'rules' => [
//                '<lang:\w+>/' => '<controller>/<action>',
                '<lang:\w+>/site/index' => 'site/index',
                '<lang:\w+>/site/contact-us' => 'site/contact-us',
                '<lang:\w+>/shop/shopping-cart' => 'shop/shopping-cart',
                '<lang:\w+>/shop/index' => 'shop/index',
                '<lang:\w+>/shop/detail' => 'shop/detail',
                '<lang:\w+>/blog/index' => 'blog/index',
                '<lang:\w+>/blog/detail' => 'blog/detail',
            ],
        ],
    ],
    'params' => $params,
];
