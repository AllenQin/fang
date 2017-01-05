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

            // get info from queue json formate
            /*
            $itemInfo = [
                'channel_id' => 'ch1',
                'type' => 'msg',
                'content' => 'hello world',
                'uid' => '2006058',
                'created_at' => time(),
            ];
             */
            if (!$itemInfo) {
                continue;
            }

            $itemInfo = json_decode($itemInfo, true);
            $channel_id = $itemInfo['channel_id'];

            // build the param
            $body = json_encode($itemInfo);
            $res = $client->request('POST', "http://msg.fang.lc/pub?id={$channel_id}", ['body' => $body]);

            echo $res->getStatusCode() . PHP_EOL;

            // write the storage queue
            $result = $redis->lpush('channel_msg_storage', $body);
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
            $queue = "channel_msg_storage";
            $itemInfo = $redis->lpop($queue);

            if (!$itemInfo) {
                continue;
            }

            $itemInfo = json_decode($itemInfo, true);
            $model = new Message();
            if ($model->load($itemInfo) && $model->save()) {
                echo '写入数据...' . PHP_EOL;
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
            'channel_id' => 'ch1',
            'type' => 'msg',
            'content' => 'hello world',
            'uid' => '2006058',
            'created_at' => time(),
            'updated_at' => time(),
            'status' => 1,
        ];
        $redis->lpush($queue, json_encode($itemInfo));
    }
}
