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
<link rel="stylesheet" href="http://g.alicdn.com/de/prismplayer/1.4.7/skins/default/index.css" />
<script type="text/javascript" src="http://g.alicdn.com/de/prismplayer/1.4.7/prism.js"></script>

  
<script src="/js/flv.min.js"></script>
<video id="videoElement"></video>
<script>
if (flvjs.isSupported()) {
    var videoElement = document.getElementById('videoElement');
    var flvPlayer = flvjs.createPlayer({
        type: 'flv',
        url: 'http://live.allenqin.com/fang/20170107_sd.flv'
    });
    flvPlayer.attachMediaElement(videoElement);
    flvPlayer.load();
    flvPlayer.play();
}
</script>

<!--
<div style="width: auto; height: 360px; ">
    <script type="text/javascript" src="/js/player/sewise.player.min.js?server=live&type=flv&streamurl=<?php echo $rtmpurl.$streamurl;?>&autostart=true&pid=&shifttime=&buffer=3&lang=en_US&logo=&title=LiveVideo&skin=liveWhite"></script>
</div>
-->
