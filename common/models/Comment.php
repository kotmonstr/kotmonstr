<?php
namespace common\models;

use Yii;
use common\models\Blog;
use common\models\User;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $content
 * @property integer $author_id
 * @property integer $created_at
 * @property integer $blog_id
 *
 * @property Blog $blog
 * @property User $author
 */
class Comment extends \yii\db\ActiveRecord
{
        public function behaviors()
{
    return [
        [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'created_at',
            'updatedAtAttribute' => 'updated_at',
        ],
      
      ];
    
}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'author_id', 'blog_id'], 'required'],
            [['content'], 'string'],
            [['author_id', 'created_at', 'blog_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content' => Yii::t('app', 'Content'),
            'author_id' => Yii::t('app', 'Author ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'blog_id' => Yii::t('app', 'Blog ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }
    
    public static function getMessagesQuantityByBlogId($blog_id){
        $model= self::find()->where(['blog_id'=>$blog_id])->all();
        if($model !== null){
            return count($model);
        }else{
            return 0;
        }
    }
}
