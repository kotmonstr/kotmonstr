<?php

namespace common\models;


use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "video".
 *
 * @property integer $id
 * @property string $youtube_id
 * @property string $title
 * @property string $descr
 * @property integer $created_at
 * @property integer $categoria
 * @property integer $author_id
 *
 * @property VideoCategoria $categoria0
 */
class Video extends \yii\db\ActiveRecord
{
public $template;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',

            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                // 'slugAttribute' => 'slug',
            ],
        ];
    }

    public $updated_at;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['youtube_id', 'title'], 'required'],
            [['descr'], 'string'],
            [['created_at', 'categoria', 'author_id'], 'integer'],
            [['youtube_id', 'title','slug'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'youtube_id' => Yii::t('app', 'Youtube ID'),
            'title' => Yii::t('app', 'Title'),
            'descr' => Yii::t('app', 'Descr'),
            'created_at' => Yii::t('app', 'Created At'),
            'categoria' => Yii::t('app', 'Categoria'),
            'author_id' => Yii::t('app', 'author_id'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(VideoCategoria::className(), ['id' => 'categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor_id()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    // Вернет несколько последних видео
    public static function getLastVideo($q)
    {
        $model = self::find()->orderBy('created_at DESC')->limit($q)->all();
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }
}
