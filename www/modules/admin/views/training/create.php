<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Training */

$this->title = 'Создать тренировку';
$this->params['breadcrumbs'][] = ['label' => 'Тренировки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'teams' => $teams,
    ]) ?>

</div>
