<?php

namespace app\modules\video\controllers;

use Yii;
use yii\web\Controller;
use Madcoda\Youtube as MadcodaYoutube;
use common\models\Video;
use yii\base\Response;
use common\models\VideoCategoria;
use yii\data\Pagination;
use common\models\Author;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use app\modules\core\controllers\CoreController;


class DefaultController extends CoreController
{

    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index',
                            'create',
                            'update',
                            'delete',
                            'preview',
                            'send-youtube-code',
                            'add',
                            'send-youtube-code',
                            'show-author',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [
                            'view',
                            'preview',
                            'show-author',
                            'show-author',
                            'get-video-by-categoria-id',
                            'get-video-by-author-id',
                            'get-video-by-time',
                            'tv24',
                            'tv1',
                            'tvc',
                            '5canal'

                        ],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                ],
            ],
        ];
    }

    public $layout = '/blog';

    public function actionView()
    {
        $categoria_id = Yii::$app->request->get('categoria_id');
        //vd($categoria_id);
        $model = Video::find()->where(['categoria' => $categoria_id]);
        //vd($model_video);
        $countQuery = clone $model;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 12]);
        $model_video = $model->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('created_at Desc')
            ->all();


        return $this->render('view', [
            'model' => $model_video,
            'pages' => $pages,
        ]);
    }

    public function actionTv24()
    {

        return $this->render('tv');
    }
    public function actionTvc()
    {

        return $this->render('tvc');
    }

    public function action5canal()
    {

        return $this->render('5canal');
    }

    public function actionDelete()
    {
        $arrResult = [];
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = Yii::$app->request->post('id');
        //vd($id);
        $model = Video::find()->where(['youtube_id' => $id])->one();
        if (!empty($model)) {
            $model->delete();
            $arrResult['result'] = 'ok';
        } else {
            $arrResult['result'] = 'error';
        }

        return $arrResult;
    }

    public function actionPreview()
    {
        $this->layout = '/adminka';
        $model = Video::find();
        //vd($model_video);
        $countQuery = clone $model;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 24]);
        $model_video = $model->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('created_at Desc')
            ->all();
        $model_categoria = VideoCategoria::find()->all();
        $model_author = Author::find()->all();
        return $this->render('preview', ['model' => $model_video, 'pages' => $pages, 'model_categoria' => $model_categoria, 'model_author' => $model_author]);
    }

    public function actionTv1()
    {

        return $this->render('tv1');
    }

    public function actionIndex()
    {

        $this->layout = '/adminka';
        $video_categoria = VideoCategoria::find()->all();
        $authors = Author::find()->all();

        return $this->render('index', ['video_categoria' => $video_categoria, 'authors' => $authors]);
    }

    public function actionYoutube()
    {

        $youtube = new Youtube(array('key' => 'AIzaSyBU4vsvP20CYdFuibdgTMOaZ10vt7JxV5c'));
        $video = $youtube->getVideoInfo('fDmSzr2u5WU');
        vd($video);
    }

    public function actionSendYoutubeCode()
    {

        $url = Yii::$app->request->post('code');


        $videoId = $url;
        //$videoId = $this->parse_youtube_url($url);
        //$videoId = $this->getYouTubeIdFromURL($url);
        $youtube = new Youtube(array('key' => 'AIzaSyBU4vsvP20CYdFuibdgTMOaZ10vt7JxV5c'));
        $video = $youtube->getVideoInfo($videoId);
        $title = $video->snippet->title;
        $descr = $video->snippet->description;
        $imageSrc = $video->snippet->thumbnails->medium->url;
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return $this->renderAjax('info', ['imageSrc' => $imageSrc,
            'title' => $title,
            'descr' => $descr,
            //'preview' => $preview,
            'id' => $video->id,
        ]);
    }

    public function actionAdd()
    {

        $data = Yii::$app->request->post();
        $y_id = $data['id'];
        //РџРѕРёСЃРє РґСѓР±Р»СЏ
        $duble = Video::find()->where(['youtube_id' => $y_id])->one();
        if (!empty($duble)) {
            Yii::$app->session->setFlash('error', "Такое видео уже есть на сайте!");
            return $this->redirect('/video/index');
        }
        //vd($data);
        $_model = new Video;
        $_model->youtube_id = $data['id'];
        $_model->title = $data['title'];
        $_model->descr = $data['descr'];
        $_model->categoria = $data['categoria'];
        $_model->author_id = $data['author_id'];

        //$_model->validate();
        //vd($_model->getErrors());

        if ($_model->save() && $_model->validate()) {
            Yii::$app->session->setFlash('success', "Видео успешно добавленно!");
        } else {
            Yii::$app->session->setFlash('error', "Error! Ошибка");
        }
        return $this->redirect('/video/index');
    }

    public function actionShowAuthor($id)
    {


        //vd($categoria_id);
        $model = Video::find()->where(['author_id' => $id]);
        //vd($model_video);
        $countQuery = clone $model;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 12]);
        $model_video = $model->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('created_at Desc')
            ->all();


        return $this->render('view', [
            'model' => $model_video,
            'pages' => $pages,
        ]);
    }

    public static function getYouTubeIdFromURL($url)
    {
//            $url_string = parse_url($url, PHP_URL_QUERY);
//            parse_str($url_string, $args);
//            return isset($args['v']) ? $args['v'] : false;

        $videoid = preg_replace("#[&\?].+$#", "", preg_replace("#http://(?:www\.)?youtu\.?be(?:\.com)?/(embed/|watch\?v=|\?v=|v/|e/|.+/|watch.*v=|)#i", "", $url));
        return $videoid;
    }

    public static function parse_youtube_url($url, $return = 'embed', $width = '', $height = '', $rel = 0)
    {
        $urls = parse_url($url);

        //expect url is http://youtu.be/abcd, where abcd is video iD
        if ($urls['host'] == 'youtu.be') {
            $id = ltrim($urls['path'], '/');
        } //expect  url is http://www.youtube.com/embed/abcd
        else if (strpos($urls['path'], 'embed') == 1) {
            $id = end(explode('/', $urls['path']));
        } //expect url is abcd only
        else if (strpos($url, '/') === false) {
            $id = $url;
        } //expect url is http://www.youtube.com/watch?v=abcd
        else {
            parse_str($urls['query']);
            $id = $v;
        }
        //return embed iframe
        if ($return == 'embed') {
            return '<iframe width="' . ($width ? $width : 560) . '" height="' . ($height ? $height : 349) . '" src="http://www.youtube.com/embed/' . $id . '?rel=' . $rel . '" frameborder="0" allowfullscreen>';
        } //return normal thumb
        else if ($return == 'thumb') {
            return 'http://i1.ytimg.com/vi/' . $id . '/default.jpg';
        } //return hqthumb
        else if ($return == 'hqthumb') {
            return 'http://i1.ytimg.com/vi/' . $id . '/hqdefault.jpg';
        } // else return id
        else {
            return $id;
        }
    }

    public function actionGetVideoByCategoriaId()
    {

        $id = Yii::$app->request->post('id');
        if ($id == '00') {
            $model = Video::find()->all();
        } else {
            $model = Video::find()->where(['categoria' => $id])->all();
        }

        //vd($model);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->renderAjax('get-video-by-categoria-id', ['model' => $model]);
    }

    public function actionGetVideoByAuthorId()
    {

        $id = Yii::$app->request->post('id');
        if ($id == '00') {
            $model = Video::find()->all();
        } else {
            $model = Video::find()->where(['author_id' => $id])->all();
        }

        //vd($model);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->renderAjax('get-video-by-categoria-id', ['model' => $model]);
    }

    public function actionGetVideoByTime()
    {

        $time = Yii::$app->request->post('time');
        //vd($time);
        if ($time == 0) {
            $model = Video::find()->orderBy('created_at DESC')->all();
        } else {
            $model = Video::find()->orderBy('created_at ASC')->all();
        }

        //vd($model);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->renderAjax('get-video-by-categoria-id', ['model' => $model]);
    }

}
