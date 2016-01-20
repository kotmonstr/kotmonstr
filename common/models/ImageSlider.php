<?php

namespace common\models;
use Yii;



/**
 * This is the model class for table "{{%images}}".
 *
 * @property string $id
 * @property string $name
 */
class ImageSlider extends \yii\db\ActiveRecord
{
   

    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

  
      public function rules()
    {
        return [
           
           //  ['file', 'extensions' => 'jpeg, gif, png'],
        ];
    }
  

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Имя'),
        ];
    }
    /**
     * return model
     */
    public static function getmodel()
    {
        
        return $model = self::find()->all();
    }
}
