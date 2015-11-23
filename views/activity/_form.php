<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'documentLink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'personInCharge')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastModifyTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <?= $form->field($model, 'Venue_id')->textInput() ?>

    <?= $form->field($model, 'Topic_id')->textInput() ?>

    <?= $form->field($model, 'ActivityType_id')->dropDownList(\app\models\ActivityType::getActivities()) ?>

    <?= $form->field($model, 'Administrator_id')->textInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
