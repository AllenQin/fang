<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '频道32';
$this->params['breadcrumbs'][] = $this->title;
?>
<blockquote>
	<p>
		测试小区直播.
	</p> <small>关键词 <cite>朝阳</cite><cite>CBD</cite></small>
</blockquote>
<div style="width: 640px; height: 360px; "azimuth: >
    <script type="text/javascript" src="/js/player/sewise.player.min.js?server=live&type=rtmp&streamurl=<?php echo $rtmpurl.$streamurl;?>&autostart=true&pid=&shifttime=&buffer=3&lang=en_US&logo=&title=LiveVideo&skin=liveWhite"></script>
</div>