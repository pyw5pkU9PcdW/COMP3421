<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserBibi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-bibi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'User_id')->dropDownList(\app\models\User::getAllUsersOptions(), array('prompt'=>'-- Select a User --')) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paper')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
