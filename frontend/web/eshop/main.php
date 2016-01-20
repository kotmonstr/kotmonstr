<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);
Yii::setAlias('@frontend_theme', dirname(__DIR__) . '/themes');
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
        ],
        'request' => [
            'baseUrl' => ''
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'errorAction' => 'site/default/error',
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'blog' => [
            'class' => 'app\modules\blog\Module',
        ],
        'site' => [
            'class' => 'app\modules\site\Module',
        ],
        'image' => [
            'class' => 'app\modules\image\Module',
        ],
        'video' => [
            'class' => 'app\modules\video\Module',
        ],
        'video_categoria' => [
            'class' => 'app\modules\video_categoria\Module',
        ],
        'author' => [
            'class' => 'app\modules\author\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
        'book' => [
            'class' => 'app\modules\book\Module',
        ],
        'profile' => [
            'class' => 'app\modules\profile\Module',
        ],
        'email' => [
            'class' => 'app\modules\email\Module',
        ],
        'cash' => [
            'class' => 'app\modules\cash\Module',
        ],
        'comment' => [
            'class' => 'app\modules\comment\Module',
        ],
        'rss' => [
            'class' => 'app\modules\rss\Module',
        ],
        'search' => [
            'class' => 'app\modules\search\Module',
        ],
        'music' => [
            'class' => 'app\modules\music\Module',
        ],
    ],
    'params' => $params,
];

