<?php

namespace common\models;

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
    const STATUS_PLAYBACK = 0;
    const STATUS_LIVE = 1;

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
            'uid' => '用户uid',
            'status' => '状态',
            'created_at' => '开通时间',
            'updated_at' => '更新时间',
        ];
    }
}
