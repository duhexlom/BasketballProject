<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Game;
/* @var $this yii\web\View */
/* @var $model app\models\Game */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('К списку', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'date',
            'place',
            [
                'label' => $model->getAttributeLabel('team_one_id'),
                'value' => $model->teamOne->name
            ],
            [
                'label' => $model->getAttributeLabel('team_two_id'),
                'value' => $model->teamTwo->name
            ],
            [
                'label' => $model->getAttributeLabel('result'),
                'value' => Game::getResultLabel($model->result),
            ],
        ],
    ]) ?>

</div>
