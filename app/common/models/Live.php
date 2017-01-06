<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%live}}".
 *
 * @property integer $id
 * @property integer $channel_id
 * @property string $url
 * @property string $app
 * @property string $stream
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Live extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%live}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['channel_id', 'url', 'app', 'stream', 'created_at', 'updated_at'], 'required'],
            [['channel_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['url', 'app', 'stream'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'channel_id' => 'Channel ID',
            'url' => 'Url',
            'app' => 'App',
            'stream' => 'Stream',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
