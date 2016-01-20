<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "geo_country".
 *
 * @property integer $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $code
 */
class GeoCountry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geo_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_en'], 'string', 'max' => 100],
            [['code'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_en' => Yii::t('app', 'Name En'),
            'code' => Yii::t('app', 'Code'),
        ];
    }
}