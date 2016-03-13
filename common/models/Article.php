<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use common\models\Template;


/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property integer $article_category
 * @property string $title
 * @property string $image
 * @property string $src
 * @property string $content
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $author
 * @property integer $updater_id
 * @property integer $view
 * @property integer $template
 *
 * @property ArticleCategory $articleCategory
 * @property Template $teamplate0
 */

class Article extends \yii\db\ActiveRecord
{
    public $file;
    public $filename;

    public function behaviors()
    {


              return [
                  TimestampBehavior::className(),
              ];


    }

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
            [['article_category', 'title', 'image', 'src', 'content', 'template'], 'required'],
            [['article_category', 'created_at', 'updated_at', 'updater_id', 'view', 'template'], 'integer'],
            [['content'], 'string'],
            [['title', 'image', 'src'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 100],
            [['article_category'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::className(), 'targetAttribute' => ['article_category' => 'id']],
            [['template'], 'exist', 'skipOnError' => true, 'targetClass' => Template::className(), 'targetAttribute' => ['template' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_category' => 'Article Category',
            'title' => 'Title',
            'image' => 'Image',
            'src' => 'Src',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'author' => 'Author',
            'updater_id' => 'Updater ID',
            'view' => 'View',
            'template' => 'Template',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'article_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemplate()
    {
        return $this->hasOne(Template::className(), ['id' => 'template']);
    }

    /**
     * @inheritdoc
     * @return ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }
}
