<?php


namespace common\models;

use Yii;

/**
 * This is the model class for table "xxx".
 *
 * @property integer $id
 * @property string $url
 */
class Xxx extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xxx';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
        ];
    }
}
