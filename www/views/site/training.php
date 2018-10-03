<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TrainingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тренировки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'date',
            'place',
            //'team_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                'view' => function($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['/site/training-view', 'id' => $model['id']]));
            }]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
