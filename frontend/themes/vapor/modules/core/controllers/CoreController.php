<?php

namespace app\modules\core\controllers;

use common\models\Online;
use yii\web\Controller;
use Yii;
use common\models\Blog;



class CoreController extends Controller
{
    public function init()
    {
        //Online::SetMyDataAsVisitor();
        //Blog::getNewsFronCroAuto();
        //echo "CORE";


        parent::init();




        // custom initialization code goes here
    }
}