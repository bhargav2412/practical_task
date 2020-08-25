<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_master".
 *
 * @property int $user_id
 * @property string $name
 * @property int $gender 1-male,2-female
 * @property string $password
 * @property int $created_at
 * @property int $updated_at
 *
 * @property UserHobbies $userHobbies
 */
class UserMaster extends \yii\db\ActiveRecord {

    public $c_pwd, $user_hobby;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
	return 'user_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
	return [
	    ['email', 'unique'],
	    ['email', 'email'],
	    ['password', 'string', 'min' => 6],
	    ['c_pwd', 'compare', 'compareAttribute' => 'password', 'message' => "Password don't match"],
	    [['name', 'gender', 'password', 'c_pwd', 'user_hobby', 'email'], 'required', 'on' => 'create'],
	    [['name', 'password', 'created_at'], 'required'],
	    [['gender', 'created_at', 'updated_at'], 'integer'],
	    [['name', 'password'], 'string', 'max' => 255],
	];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
	return [
	    'user_id' => 'User ID',
	    'name' => 'Name',
	    'gender' => 'Gender',
	    'password' => 'Password',
	    'created_at' => 'Created At',
	    'updated_at' => 'Updated At',
	    'c_pwd' => 'Confirm Password',
	    'user_hobby' => 'Hobbies',
	];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHobbies() {
	return $this->hasOne(UserHobbies::className(), ['id' => 'user_id']);
    }

}
