<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "review".
 *
 * @property integer $id
 * @property integer $good_id
 * @property string $name
 * @property string $email
 * @property string $content
 * @property integer $created_at
 *
 * @property Goods $good
 */
class Review extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at'
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['good_id', 'name', 'email', 'content'], 'required'],
            [['good_id', 'created_at','updated_at'], 'integer'],
            [['content'], 'string'],
            [['name', 'email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'good_id' => 'Товар ID',
            'name' => 'Имя',
            'email' => 'Email',
            'content' => 'Отзыв',
            'created_at' => 'Время',
            'updated_at' => 'Время',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGood()
    {
        return $this->hasOne(Goods::className(), ['id' => 'good_id']);
    }
    // Верент
    public static function getReviewsByGoodId($id){
        $model = self::find()->where(['good_id'=> $id])->all();
        if($model){
            return $model;
        }else{
            return false;
        }
    }
}
