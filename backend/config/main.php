<?php
$rootDir = dirname(dirname(__DIR__));

$params = array_merge(
    require($rootDir . '/common/config/params.php'),
    require($rootDir . '/common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'vendorPath' => $rootDir . '/vendor',
    'preload' => ['log'],
    'controllerNamespace' => 'backend\controllers',
    'modules' => [
        'gii' => 'yii\gii\Module'
    ],
    'extensions' => require($rootDir . '/vendor/yiisoft/extensions.php'),
    'components' => [
        'db' => $params['components.db'],
        'cache' => $params['components.cache'],
        'mail' => $params['components.mail'],
        'urlManager' => $params['components.urlManager'],
        'user' => [
            'identityClass' => 'common\models\User',
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
    ],
    'params' => $params,
];
