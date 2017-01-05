<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%channel}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Channel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%channel}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'created_at', 'updated_at'], 'required'],
            [['uid', 'status', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
