<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=u713312557_kot',
            'username' => 'u713312557_kot',
            'password' => 'jokers12',
            'charset' => 'utf8',
        ],
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing' => true,
            'rules' => [

                ''=>'site/default/index',
                'signup'=>'/site/default/signup',
                'login'=>'/site/default/login',
                'logout'=>'/site/default/logout',
                'images'=>'/image/default/preview',
                'news'=>'/blog/default/index',
                'blog'=>'/article/default/index',
                'music'=>'/music/default/show',
                'books'=>'/book/default/views',
                'site/index'=>'site/default/index',

                'article/list/<slug:.+>' => '/article/default/views',
                'blog/list/<slug:.+>' => '/blog/default/views',

                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<_m:[\w\-]+>' => '<_m>/default/index',
                // /module/default/action -> /module/action
                '<_m:[\w\-]+>/<_a:[\w\-]+>' => '<_m>/default/<_a>',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['user', 'moder', 'admin'], //здесь прописываем роли
            //зададим куда будут сохраняться наши файлы конфигураций RBAC
            'itemFile' => '@common/components/rbac/items.php',
            'assignmentFile' => '@common/components/rbac/assignments.php',
            'ruleFile' => '@common/components/rbac/rules.php'
        ],
    ],
];
