<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Game */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="game-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->widget(kartik\datetime\DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Укажите время'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]); ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'team_one_id')->dropDownList($teams, ['prompt'=>'Выберите команду']); ?>

    <?= $form->field($model, 'team_two_id')->dropDownList($teams, ['prompt'=>'Выберите команду']); ?>

    <?= $form->field($model, 'result')->dropDownList($results, ['prompt'=>'Выберите результат']); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('К списку', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
