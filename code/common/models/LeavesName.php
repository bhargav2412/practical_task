<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leaves_name".
 *
 * @property int $iLeaveNameId
 * @property string $vLeaveName
 */
class LeavesName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leaves_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vLeaveName'], 'required'],
            [['vLeaveName'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iLeaveNameId' => 'I Leave Name ID',
            'vLeaveName' => 'V Leave Name',
        ];
    }
}
