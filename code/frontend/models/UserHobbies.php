<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_hobbies".
 *
 * @property int $id
 * @property int $user_id
 * @property string $hobby_name
 *
 * @property UserMaster $id0
 */
class UserHobbies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_hobbies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'hobby_name'], 'required'],
            [['user_id'], 'integer'],
            [['hobby_name'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => UserMaster::className(), 'targetAttribute' => ['id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'hobby_name' => 'Hobby Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(UserMaster::className(), ['user_id' => 'id']);
    }
}
