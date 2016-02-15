<?php

namespace app\modules\core\controllers;

use common\models\Online;
use yii\web\Controller;
use Yii;



class CoreController extends Controller
{
    public function init()
    {
        Online::SetMyDataAsVisitor();
        echo "CORE";


        parent::init();




        // custom initialization code goes here
    }
}