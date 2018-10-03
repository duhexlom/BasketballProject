<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Игры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-index">

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
            //'team_one_id',
            //'team_two_id',
            //'result',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                'view' => function($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['/site/game-view', 'id' => $model['id']]));
            }]
        ],
       ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
