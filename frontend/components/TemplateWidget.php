<?php
namespace app\components;

use yii\base\Widget;


class TemplateWidget extends Widget
{
    public $model;
    public $template;

    public function init()
    {
        parent::init();
        $this->template = $this->model->template ? $this->model->template : $this->template;

    }

    public function run()
    {
        if ($this->template) {
            echo $this->render('template/_template_'.$this->template, ['model' => $this->model]);
        } else {
            echo $this->render('_template_1', ['model' => $this->model]);
        }

    }

}