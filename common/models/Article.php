<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $src
 * @property string $content
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $author
 * @property integer $updater_id
 * @property integer $view
 */
class Article extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title' ], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at', 'updater_id', 'view'], 'integer'],
            [['title', 'image', 'src'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'src' => 'Src',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'author' => 'Author',
            'updater_id' => 'Updater ID',
            'view' => 'View',
        ];
    }
}
