<?php
return [
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
    ],
 
];
