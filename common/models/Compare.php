<?php

namespace common\models;

use Yii;use common\models\Goods;

/**
 * This is the model class for table "compare".
 *
 * @property integer $id
 * @property string $ip
 * @property integer $goods_id
 * @property integer $price
 * @property integer $category_id
 * @property integer $brend_id
 * @property integer $created_at
 */
class Compare extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compare';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip', 'goods_id', 'price', 'category_id', 'created_at'], 'required'],
            [['goods_id', 'price', 'category_id', 'brend_id', 'created_at'], 'integer'],
            [['ip'], 'string', 'max' => 255]
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
            'goods_id' => 'Goods ID',
            'price' => 'Price',
            'category_id' => 'Category ID',
            'brend_id' => 'Brend ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['id' => 'goods_id']);
    }


    // Ести ли товар в списке
    // return bool : true /false
    public static function _isItemAlreadyIn($good_id, $ip)
    {
        $model = self::find()->where(['ip' => $ip,'goods_id'=>$good_id ])->one();
        if ($model) {
            return true;
        } else {
            return false;
        }
    }


    // Вернет все товары по ip
    public static function getListByIp($iP)
    {
        $model = self::find()->where(['ip' => $iP])->all();
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }
}
