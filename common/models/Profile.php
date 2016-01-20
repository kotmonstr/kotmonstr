<?php

namespace common\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $login
 * @property string $name
 * @property string $sername
 * @property integer $gender
 * @property string $avatar
 * @property integer $city_id
 * @property integer $country_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          
            [['user_id', 'gender',  'country_id', 'created_at', 'updated_at'], 'integer'],
            [['login'], 'string', 'max' => 255],
            [['name', 'sername', 'avatar'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'login' => Yii::t('app', 'Login'),
            'name' => Yii::t('app', 'Имя'),
            'sername' => Yii::t('app', 'Фамилия'),
            'gender' => Yii::t('app', 'Пол'),
            'avatar' => Yii::t('app', 'Аватар'),
            'city_id' => Yii::t('app', 'Город'),
            'country_id' => Yii::t('app', 'Страна'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}