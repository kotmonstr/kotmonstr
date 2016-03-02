<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\ImageSlider;
use common\models\Photo;

class SliderWidget extends Widget
{
    public $model;
    public $source;
    public $path;

    public function init()
    {
        parent::init();

        if($this->source == 'photo'){
            $this->model = Photo::find()->all();
            $this->path ='/upload/multy-thumbs/';
            //vd($this->model);
        }
        if($this->source == 'slider') {
            $this->model = ImageSlider::find()->where(['status' => '0'])->all();
            $this->path ='/upload/slider-thumbs/';
        }
    }

    public function run()
    {
//vd($this->model);
        if ($this->model) {
            echo $this->render('_slider', ['model' => $this->model,'path'=>$this->path]);
        } else {
            return false;
        }

    }

}