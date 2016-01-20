<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;
use common\models\User;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $content
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $author
 */
class Blog extends \yii\db\ActiveRecord
{
    public $file;
   
    public function behaviors()
{
    return [
        [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'created_at',
        ],
         [
              'class' => BlameableBehavior::className(),
             'createdByAttribute' => 'author',
             'updatedByAttribute' => 'updater_id',          
         ],
      ];
    
}

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at', 'author', 'view', 'updater_id'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'image' => Yii::t('app', 'Image'),
            'content' => Yii::t('app', 'Содержание'),
            'created_at' => Yii::t('app', 'Дата создания'),
            'updated_at' => Yii::t('app', 'Дата редактирования'),
            'author' => Yii::t('app', 'Автор'),
            'view' => Yii::t('app', 'Просмотров'),
            'updater_id' => Yii::t('app', 'Редактор ID'),
        ];
    }
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updater_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'author']);
    }
}
