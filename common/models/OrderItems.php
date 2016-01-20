<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $ip
 * @property integer $goods_id
 * @property integer $quantity
 * @property integer $price
 * @property integer $category_id
 * @property integer $brend_id
 *
 * @property Order $order
 * @property Goods $category
 * @property Brend $brend
 * @property Goods $goods
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'ip', 'goods_id', 'quantity', 'price', 'category_id'], 'required'],
            [['order_id', 'goods_id', 'quantity', 'price', 'category_id', 'brend_id'], 'integer'],
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
            'order_id' => 'Order ID',
            'ip' => 'Ip',
            'goods_id' => 'Goods ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'category_id' => 'Category ID',
            'brend_id' => 'Brend ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Goods::className(), ['category_id' => 'category_id']);
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
}
