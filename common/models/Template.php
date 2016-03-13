<?php

namespace common\models;

use Yii;
use common\models\Article;

/**
 * This is the model class for table "template".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property Article[] $articles
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['template' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TemplateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TemplateQuery(get_called_class());
    }
}
