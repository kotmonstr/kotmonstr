<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "video_categoria".
 *
 * @property integer $id
 * @property string $name
 */
class VideoCategoria extends \yii\db\ActiveRecord
{
    public function behaviors()
    {


        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
            ],
        ];


    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }
    /*
     * return model
     */
    public static function getModel(){
        return VideoCategoria::find()->all();
    }

    public static function getAllBySlug($slug){
        $model = self::find()->where(['slug' => $slug])->all();
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }

    public static function getModelNonEmpty(){
        return VideoCategoria::find()
            ->leftJoin('video','video_categoria.id = video.categoria')
            ->where('video.categoria IS NOT NULL')
            ->all();
    }
}
