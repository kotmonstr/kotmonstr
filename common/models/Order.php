<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $ip
 * @property integer $status
 * @property integer $created_at
 * @property integer $country_id
 * @property integer $city_id
 * @property integer $post_index
 * @property string $first_name
 * @property string $second_name
 * @property string $ser_name
 * @property integer $payment_type
 * @property string $telephone
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip', 'status', 'created_at', 'country_id', 'city_id', 'post_index', 'first_name', 'second_name', 'ser_name', 'payment_type', 'telephone'], 'required'],
            [['status', 'created_at', 'country_id', 'city_id', 'post_index', 'payment_type'], 'integer'],
            [['ip', 'telephone'], 'string', 'max' => 255],
            [['first_name', 'second_name', 'ser_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'status' => '1-выполняется, 0 - выполнен',
            'created_at' => 'Created At',
            'country_id' => 'Country ID',
            'city_id' => 'City ID',
            'post_index' => 'Post Index',
            'first_name' => 'First Name',
            'second_name' => 'Second Name',
            'ser_name' => 'Ser Name',
            'payment_type' => 'Payment Type',
            'telephone' => 'Telephone',
        ];
    }

    /*
     * return model
     */
    public static function getAllByIp($ip){
        $model = self::find()->where(['ip'=>$ip])->all();
        if($model){
            return  $model;
        }else{
            return false;
        }
    }
}
