<?php

namespace app\modules\rss\controllers;

use yii\web\Controller;
use common\models\NewsletterForm;
use Yii;
use common\models\Email;
use yii\filters\VerbFilter;
use common\models\EmailSearch;
use yii\filters\AccessControl;
use yii\mail\BaseMailer;
use app\modules\core\controllers\CoreController;

class DefaultController extends CoreController {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index','test'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public $layout = '/blog';

 public function actionIndex(){
     $url = 'http://liverss.ru/';
     //$url = 'https://news.yandex.ru/world.html';
     //$url = 'https://news.yandex.ru/world.rss';

     $rss = file_get_contents($url);

//$rss = simplexml_load_file($url);       //Интерпретирует XML-файл в объект
     vd($rss);

     return $this->render('index',['rss'=> $rss]);
 }
    public function actionTest(){
        return $this->render('test');
    }

}
