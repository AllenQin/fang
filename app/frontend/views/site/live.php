<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\JqueryAsset;

$this->title = '频道32';
$this->registerJsFile('/js/message.js', ['depends' => JqueryAsset::className()]);
?>
<style>
.video {
    height: 100%;
    width: 100%;
    display: block;
}
.message
{
    width:95%;
    height:260px;
    background:#c3c3c3;
    border-radius:6px;
    padding-top:10px;
}
.message ul
{
    width:100%;
    list-style:none;
    margin:0;
    padding:0;
}

.message ul li
{
    float:left;
    width:100%;
    display:block;
}

.avatar {
    float:left;
}
.avatar img
{
    width:37px;
    height:37px;
    margin-left:18px;
}
.content {
    float:left;
    background:#fff;
    text-align:left;
    padding:10px;
    max-width:170px;
    border-radius:5px;
}

.msg-tip
{
    margin-top:10px;
    float:left;
    width: 0;
    height: 0;
    border-width: 10px;
    border-style: solid;
    border-color: transparent #fff transparent transparent;
}

.msg-val
{
    width:75%;
    float:left;
}

.send-button
{
    float:left;
    margin-left:10px;
}

</style>
<video controls autoplay class="video">  
    <source src="http://fang.allenqin.com/record/fang/20170107_7.m3u8" type="application/vnd.apple.mpegurl" />
    <p class="warning">Your browser does not support HTML5 video.</p>  
</video>

<legend>消息</legend>
<div class="message">
	<ul>
	</ul>
</div>

<div class="send-div" style="margin-top:10px;">
<?php 
echo Html::input('text', '', '', ['class' => 'form-control msg-val', 'placeholder' => '点击发言']);
echo Html::button('发送', ['class' => 'btn btn-primary send-button']);
?>
</div>
<script>
	var config = {
		msgurl:"<?php echo Yii::$app->params['www_url'].'/site/msg';?>",
		room:"<?php echo $room;?>",
		socketurl: "<?php echo Yii::$app->params['msg_url'].'/ws/';?>",
		avaratnum : "<?php echo rand(1, 3)?>",
	};
</script>