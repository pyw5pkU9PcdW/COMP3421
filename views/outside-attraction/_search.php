<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OutsideAttractionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outside-attraction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Outside_Attraction_name') ?>

    <?= $form->field($model, 'Outside_Attraction_description') ?>

    <?= $form->field($model, 'Outside_Attraction_let') ?>

    <?= $form->field($model, 'Outside_Attraction_lng') ?>

    <?php // echo $form->field($model, 'Outside_Attraction_image_file') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
