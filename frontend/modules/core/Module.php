<?php

namespace app\modules\email;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\core\controllers';

    public function init()
    {
        echo "CORE";
        parent::init();

        // custom initialization code goes here
    }
}
