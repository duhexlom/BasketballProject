<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Training */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Тренировки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'date',
            'place',
            'team_id',
        ],
    ]) ?>

</div>
