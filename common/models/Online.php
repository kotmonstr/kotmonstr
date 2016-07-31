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
            [['social_name', 'user_ip'], 'string', 'max' => 255],
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
        $identity = Yii::$app->getUser()->getIdentity();
        if (isset($identity->profile)) {
            $socialName = $identity->profile['name'] ? $identity->profile['name'] : 'unknouwn';
        }else{
            $socialName = 'unknouwn';
        }


        $userId = !Yii::$app->user->isGuest ? Yii::$app->user->id : NULL;
        $ip = Yii::$app->request->userIP;

        $dublicate = self::getDublicate();
        if ($dublicate) {
            self::updateTime($dublicate);
        } else {
            $model = new Online;
            $model->user_id = $userId;
            $model->user_ip = $ip;
            $model->last_visit = time();
            $model->social = $socialName ? '1' : NULL;
            $model->social_name = $socialName ? $socialName : NULL;
            //$model->validate();
            // vd($model->getErrors());
            $model->save();
        }


    }

    public static function getDublicate()
    {
        $identity = Yii::$app->getUser()->getIdentity();

        if (!Yii::$app->user->isGuest) {
            $model = self::find()->where(['user_id' => Yii::$app->user->id])->one();
            if($model)return $model;
        }
        elseif (Yii::$app->user->isGuest) {
            $model = self::find()->where(['user_ip' => Yii::$app->request->userIP])->one();
           if($model)return $model;
        }
        elseif (isset($identity->profile)) {
            $model = self::find()->where(['social_name' => $identity->profile['name']])->one();
            if($model)return $model;
        }else{
            return false;
        }



    }

    public static function updateTime($model){
        $model->last_visit=time();
        $model->updateAttributes(['last_visit']);
    }

    public static function getlastitmeById($id){
        $model = self::find()->where(['user_id'=> $id])->one();
        if($model){
            return $model->last_visit;
        }else{
            return false;
        }
    }
}
