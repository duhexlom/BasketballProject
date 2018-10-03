<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Training */

$this->title = 'Обновить тренировку: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Тренировки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="training-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'teams' => $teams,
    ]) ?>

</div>
