<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $checkbox;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required','message'=>'Имя обьязательно для заполнения'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Это имя уже используется'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required','message'=>'Email обьязательно для заполнения'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Это Email уже используется.'],

            ['password', 'required','message'=>'Password обьязательно для заполнения'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = $this->password;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
            return $user;
        }

        return null;
    }
}
