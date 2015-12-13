<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
    <?php ActiveForm::end(); ?>
</div>
