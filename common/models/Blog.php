<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;
use common\models\User;
use yii\behaviors\SluggableBehavior;

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
 * @property string $slug
 */
class Blog extends \yii\db\ActiveRecord
{
    public $file;
    public $template;

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
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                // 'slugAttribute' => 'slug',
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
            [['title', 'image', 'slug'], 'string', 'max' => 255]
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
            'slug' => Yii::t('app', 'Slug'),
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

    public static function getDublicateByTitle($title)
    {
        $model = self::find()->where(['title' => $title])->one();
        if ($model) {
            return true;
        } else {
            return false;
        }

    }

    public static function getNewsFromCronAuto()
    {
        $result = 0;
        $file = Yii::getAlias('@json') . DIRECTORY_SEPARATOR . 'cron-import.json';
        if (file_exists($file)) {
            $data = file_get_contents($file);
            $data = unserialize($data);

            if ($data) {
                foreach ($data as $row) {
                    $duble = Blog::getDublicateByTitle(mb_convert_encoding($row['title'], 'UTF-8', 'Windows-1251'));
                    if (!$duble) {
                        $model = new Blog();
                        $model->title = mb_convert_encoding($row['title'], 'UTF-8', 'Windows-1251');
                        $model->image = $row['image'] ? $row['image'] : '';
                        $model->content = mb_convert_encoding($row['content'], 'UTF-8', 'Windows-1251');
                        $model->updated_at = time();
                        $model->author = (int)1;
                        $model->save();
                        $result = 1;
                    }
                    $result = 2;
                }
            }
        }
        return $result;
    }
    

}
