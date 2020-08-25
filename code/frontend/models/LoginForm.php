<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model {

    public $vEmailId;
    public $vPassword;
    public $rememberMe = true;
    private $_user_master;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // username and password are both required
            [['vEmailId', 'vPassword'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['vPassword', 'validatePassword'],
        ];
    }

    public function attributeLabels() {
        return [
            'vEmailId' => 'Email Id',
            'vPassword' => 'Password',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user) {
                $this->addError($attribute, 'User not valid.');
            } else {
                if ($user->vPassword != md5($this->vPassword)) {
                    $this->addError($attribute, 'Incorrect username or password.');
                }
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login() {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser() {
        if ($this->_user_master === null) {
            $this->_user_master = UsersMaster::findByEmail($this->vEmailId);
        }
        return $this->_user_master;
    }

}
