<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\ImageSlider;

class SliderWidget extends Widget
{
    public $model;

    public function init()
    {
        parent::init();
        $this->model = ImageSlider::find()->where(['status' => '0'])->all();
    }

    public function run()
    {

        if ($this->model) {
            echo $this->render('_slider', ['model' => $this->model]);
        } else {
            return false;
        }

    }

}