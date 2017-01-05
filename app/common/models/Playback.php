<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%playback}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $channel_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Playback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%playback}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'channel_id', 'created_at', 'updated_at'], 'required'],
            [['uid', 'channel_id', 'status', 'created_at', 'updated_at'], 'integer'],
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
            'channel_id' => 'Channel ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
