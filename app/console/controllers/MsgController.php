<?php
namespace console\controllers;

use Yii;
use \yii\console\Controller;
use common\models\Message;

class MsgController extends Controller
{
    /**
     * 推送广播
     *
     */
    public function actionSend()
    {
        $client = new \GuzzleHttp\Client();
        $redis = Yii::$app->redis;
        while (true) {

            $queue = "channel_msg";
            $itemInfo = $redis->lpop($queue);

            if (!$itemInfo)
                continue;

            $channel_id = (json_decode($itemInfo, true))['channel_id'];

            // build the param
            $res = $client->request('POST', "http://msg.fang.lc/pub?id={$channel_id}", ['body' => $itemInfo]);

            // write the storage queue
            $result = $redis->lpush('channel_msg_storage', $itemInfo);
            if (!$result) {
                // write the storage queue fail
            }
        }
    }

    /**
     * 持久化数据库
     *
     */
    public function actionStorage()
    {
        $redis = Yii::$app->redis;
        while(true) {
            $itemInfo = $redis->lpop("channel_msg_storage");
            if (!$itemInfo)
                continue;

            $model = new Message();
            if ( ($model->attributes = json_decode($itemInfo, true)) && $model->save()) {
                // storage success
            } else {
                //  storage error
            }
        }
    }

    public function actionTest()
    {
        $redis = Yii::$app->redis;

        $queue = "channel_msg";
        $itemInfo = [
            'channel_id' => '32',
            'type' => 1,
            'content' => 'hello world',
            'uid' => '2006058',
            'created_at' => time(),
            'updated_at' => time(),
            'status' => 1,
        ];
        $redis->lpush($queue, json_encode($itemInfo));
    }
}
