<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.css',
        'css/responsive.css',
        'css/camera.css',
        'css/style.css',
        'css/system_message.css',
    ];
    public $js = [
        'js/jquery.js',
        'js/jquery.easing.1.3.js',
        'js/camera.js',
        'js/jquery.ui.totop.js',
        'js/jquery.mobile.customized.min.js',
        'js/bootstrap.js',
        'js/custom/index.js',
        'js/custom/system_message.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',


    ];
}
