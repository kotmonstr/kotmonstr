<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property string $ip
 * @property integer $goods_id
 * @property integer $quantity
 * @property integer $price
 * @property integer $category_id
 * @property integer $brend_id
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip', 'goods_id', 'quantity', 'price', 'category_id'], 'required'],
            [['goods_id', 'quantity', 'price', 'category_id', 'brend_id'], 'integer'],
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
            'quantity' => 'Quantity',
            'price' => 'Price',
            'category_id' => 'Category ID',
            'brend_id' => 'Brend ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['id' => 'goods_id']);
    }


    /*
     * Вернет все товары пользователя
     */
    public static function getAllByIp($ip)
    {
        $model = self::find()->where(['ip' => $ip])->all();
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }

    /*
   * Вернет количество всех товаров пользователя
   */
    public static function getQountAllByIp($ip)
    {

        $i = 0;
        $total = 0;;
        $model = self::find()->where(['ip' => $ip])->all();
        if ($model) {
            foreach ($model as $order) {
                $total = $total + $order->quantity;
            }
            return($total);
        } else {
            return false;
        }

    }

    /*
* Вернет bool
 * Товар есть в корзине или нет
*/
    public static function _isItemAlreadyInCart($id)
    {
        $model = self::find()->where(['goods_id' => $id, 'ip' => Yii::$app->session->id])->one();
        if ($model) {
            return true;
        } else {
            return false;
        }
    }

    /*
  * Вернет один товар
  */
    public static function getItemById($id)
    {
        $model = self::find()->where(['goods_id' => $id, 'ip' => Yii::$app->session->id])->one();
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }


    /*
* Удаляет товар из корзины
*/
    public static function deleteItemById($id)
    {
        $model = self::find()->where(['goods_id' => $id, 'ip' => Yii::$app->session->id])->one();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return false;
        }
    }

// Увеличить количество на 1
    public static function updateItemQuantityUp($id)
    {
        $model = self::find()->where(['goods_id' => $id, 'ip' => Yii::$app->session->id])->one();
        $q = $model->quantity;

        $model->quantity = $q + 1;
        $model->updateAttributes(['quantity']);

    }

    // Увеличить количество
    public static function updateItemQuantityUpMany($id, $total)
    {
        $model = self::find()->where(['goods_id' => $id, 'ip' => Yii::$app->session->id])->one();
        $q = $model->quantity;
        $model->quantity = $q + $total;
        $model->updateAttributes(['quantity']);

    }
}
