<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;


class CarouselWidget extends Widget
{
    public $model;
    public $source;
    public $path;

    public function init()
    {
        parent::init();

    }

    public function run()
    {

        if ($this->model) {
            echo $this->render('_carousel', ['model' => $this->model]);
        } else {
            return false;
        }

    }

}