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
<style>
video {
    height: 100%;
    width: 100%;
    display: block;
}
</style>
<video controls autoplay class="video">  
    <source src="http://live.allenqin.com/fang/20170107.m3u8" type="application/vnd.apple.mpegurl" />
    <p class="warning">Your browser does not support HTML5 video.</p>  
</video>