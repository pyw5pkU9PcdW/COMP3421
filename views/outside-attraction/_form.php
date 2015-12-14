<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OutsideAttraction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outside-attraction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Outside_Attraction_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Outside_Attraction_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Outside_Attraction_let')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Outside_Attraction_lng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Outside_Attraction_image_file')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
