<?php

namespace app\modules\search\controllers;


use yii\web\Controller;
use Yii;
use common\models\Xxx;
use yii\data\Pagination;
use yii\filters\AccessControl;


class DefaultController extends Controller
{
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['index'],
                'rules' => [

                    [
                        'actions' => ['xxx','show-item'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function actionShowItem()
    {
        // если не зарегистрированный пользователь
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        // если админ
        $item = Yii::$app->request->get('item');
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role == 1 && $item == 'xxx') {
            return $this->redirect('/search/xxx');
        }
        return $this->goHome();
    }

    public function actionXxx()
    {
        if (!Yii::$app->user->isGuest  ) {
            $this->layout = '/blog';
            $model = Xxx::find();

            $countQuery = clone $model;
            $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 12]);
            $model_video = $model->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy('id Desc')
                ->all();

            return $this->render('xxx', ['model' => $model_video, 'pages' => $pages]);
        }else{
            return $this->goHome();
        }
    }


}
