<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "geo_city".
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $name_ru
 * @property string $name_en
 * @property string $region
 * @property string $postal_code
 * @property string $latitude
 * @property string $longitude
 */
class GeoCity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geo_city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id'], 'integer'],
            [['name_ru', 'name_en'], 'string', 'max' => 100],
            [['region'], 'string', 'max' => 2],
            [['postal_code', 'latitude', 'longitude'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_en' => Yii::t('app', 'Name En'),
            'region' => Yii::t('app', 'Region'),
            'postal_code' => Yii::t('app', 'Postal Code'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
        ];
    }
}