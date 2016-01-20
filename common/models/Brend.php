<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brend".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Goods[] $goods
 * @property Wishlist[] $wishlists
 */
class Brend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brend';
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
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['brend_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlists()
    {
        return $this->hasMany(Wishlist::className(), ['brend_id' => 'id']);
    }
}
