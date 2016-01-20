<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property integer $id
 * @property string $ip
 * @property integer $user_id
 * @property string $content
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property integer $created_at
 *
 * @property User $user
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'name', 'email', 'subject'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['content'], 'string'],
            [['ip'], 'string', 'max' => 11],
            [['name', 'email', 'subject'], 'string', 'max' => 255],
            ['email', 'email'],
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
            'user_id' => 'User ID',
            'content' => 'Content',
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'created_at' => 'Created At',
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
