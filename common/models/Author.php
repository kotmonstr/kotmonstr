<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use common\models\Video;

/**
 * This is the model class for table "author".
 *
 * @property integer $id
 * @property string $name
 * @property string $descr
 *
 * @property Video[] $videos
 */
class Author extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                // 'slugAttribute' => 'slug',
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'descr' => Yii::t('app', 'Descr'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['author_id' => 'id']);
    }
    
    public static function getListAuthorNonEmpty(){
        $model = self::find()
            ->leftJoin('video','`author`.`id` = `video`.`author_id`')
            //->where(['author.id' => 'video.author_id'])
            //->where(['<>','video.author_id', 111111])
            ->where('video.author_id IS NOT NULL')
            //->with('videos')
            ->all();

        return $model ? $model : false;
    }
}
