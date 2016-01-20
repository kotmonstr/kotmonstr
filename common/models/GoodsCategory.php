<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goods_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $descr
 *
 * @property Shop[] $shops
 */
class GoodsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['descr'], 'string'],
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
            'name' => 'Имя',
            'descr' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shop::className(), ['category_id' => 'id']);
    }

       /**
     * @return \yii\db\ActiveQuery
     */
    public function getName()
    {
        return $this->name;
    }

}
