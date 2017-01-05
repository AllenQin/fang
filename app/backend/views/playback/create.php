<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Playback */

$this->title = 'Create Playback';
$this->params['breadcrumbs'][] = ['label' => 'Playbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
