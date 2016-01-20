<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wishlist".
 *
 * @property integer $id
 * @property string $ip
 * @property integer $goods_id
 * @property integer $price
 * @property integer $category_id
 * @property integer $brend_id
 *
 * @property Brend $brend
 * @property Goods $goods
 * @property GoodsCategory $category
 */
class Wishlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wishlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip', 'goods_id', 'price', 'category_id','created_at'], 'required'],
            [['goods_id', 'price', 'category_id', 'brend_id','created_at'], 'integer'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrend()
    {
        return $this->hasOne(Brend::className(), ['id' => 'brend_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(GoodsCategory::className(), ['id' => 'category_id']);
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


    // Вернет товар
    // return model
    public static function getItemByGoodId($good_id, $ip)
    {
        $model = self::find()->where(['ip' => $ip,'goods_id'=>$good_id ])->one();
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }

    // Веренет статус товара Нахотится ли он в widhlist млмнет
    public static function getWishlistState($good_id){
        $model = self::find()->where(['ip' => Yii::$app->session->id,'goods_id'=>$good_id ])->one();
        if ($model) {
            return true;
        } else {
            return false;
        }
    }
}
