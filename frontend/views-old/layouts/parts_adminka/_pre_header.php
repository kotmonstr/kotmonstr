<?php

use backend\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;

AppAsset::register($this);
$this->registerCssFile('/matis/lib/bootstrap/css/bootstrap.min.css', ['depends' => BootstrapAsset::className()]);
$this->registerCssFile('/matis/lib/font-awesome/css/font-awesome.min.css', ['depends' => BootstrapAsset::className()]);
$this->registerCssFile('/matis/css/main.min.css', ['depends' => BootstrapAsset::className()]);
$this->registerCssFile('/matis/lib/metismenu/metisMenu.min.css', ['depends' => BootstrapAsset::className()]);
$this->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans:400,600,700', ['depends' => BootstrapAsset::className()]);
$this->registerCssFile('http://fonts.googleapis.com/css?family=Kaushan+Script:400', ['depends' => BootstrapAsset::className()]);


//$this->registerJsFile('/js/last/jquery.js', ['depends' => AppAsset::className()]);
//$this->registerJsFile('/matis/lib/jquery/jquery.min.js', ['depends' => AppAsset::className()]);
//$this->registerJsFile('/matis/lib/switch/js/bootstrap-switch.min.js', ['depends' => AppAsset::className()]);
//$this->registerJsFile('/matis/lib/bootstrap/js/bootstrap.min.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/matis/lib/modernizr/modernizr.min.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/matis/lib/metismenu/metisMenu.min.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/js/youtube.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/js/custom/flash.js', ['depends' => AppAsset::className()]);


$this->registerCssFile('/switch/bootstrap-switch.min.css', ['depends' => BootstrapAsset::className()]);
$this->registerJsFile('/switch/bootstrap-switch.min.js', ['depends' => AppAsset::className()]);


