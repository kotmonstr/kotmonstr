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
            'rules' => [
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<_m:[\w\-]+>' => '<_m>/default/index',
                // /module/default/action -> /module/action
                '<_m:[\w\-]+>/<_a:[\w\-]+>' => '<_m>/default/<_a>'
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['user','moder','admin'], //здесь прописываем роли
            //зададим куда будут сохраняться наши файлы конфигураций RBAC
            'itemFile' => '@common/components/rbac/items.php',
            'assignmentFile' => '@common/components/rbac/assignments.php',
            'ruleFile' => '@common/components/rbac/rules.php'
        ],
    ],
];
