<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_categoria".
 *
 * @property integer $id
 * @property string $name
 */
class VideoCategoria extends \yii\db\ActiveRecord
{
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
}
