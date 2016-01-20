<?php
namespace common\models;

use Yii;
use yii\base\Model;


/**
 * Login form
 */
class NewsletterForm extends Model
{
 public $email;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [     
            [['email', 'email'], 'required'],
             ['email', 'email'],
           
        ];
    }


}
