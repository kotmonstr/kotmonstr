<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "online".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $user_ip
 * @property integer $last_visit
 * @property integer $social
 * @property string $social_name
 */
class Online extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'online';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'last_visit', 'social'], 'integer'],
            [['social_name'], 'required'],
            [['user_ip', 'social_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_ip' => 'User Ip',
            'last_visit' => 'Last Visit',
            'social' => 'Social',
            'social_name' => 'Social Name',
        ];
    }

    /**
     * @inheritdoc
     * @return OnlineQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OnlineQuery(get_called_class());
    }

    public static function SetMyDataAsVisitor()
    {
    $user_id = !Yii::$app->user->isGuest ? Yii::$app->user->id : 'NULL';
    $ip = Yii::$app->request->userIP;
        vd($user_id . $ip);
    }
}
