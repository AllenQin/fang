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
<link href="http://vjs.zencdn.net/5.5.3/video-js.css" rel="stylesheet">
<!-- If you'd like to support IE8 -->
<script src="http://vjs.zencdn.net/ie8/1.1.1/videojs-ie8.min.js"></script>
<video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
 poster="https://img.alicdn.com/imgextra/i2/754328530/TB2FpxhkXXXXXa5XXXXXXXXXXXX_!!754328530.jpg" data-setup="{}">
    <source src="<?php echo $rtmpurl.$streamurl;?>" type="rtmp/flv">
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
 </video>
 <script src="http://vjs.zencdn.net/5.5.3/video.js"></script>