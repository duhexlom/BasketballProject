<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Game */

$this->title = 'Обновить игру: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Игры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="game-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'teams' => $teams,
        'results' => $results,
    ]) ?>

</div>
