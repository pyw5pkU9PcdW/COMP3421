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

    <?= $form->field($model, 'datetime')->textInput() ?>

    <?= $form->field($model, 'Venue_id')->dropDownList(\app\models\Venue::getVenueOptions(), array('prompt'=>'-- Select a Venue --')) ?>

    <?= $form->field($model, 'Topic_id')->dropDownList(\app\models\Topic::getTopicOptions(), array('prompt'=>'-- Select a Topic --')) ?>

    <?= $form->field($model, 'ActivityType_id')->dropDownList(\app\models\ActivityType::getActivityTypeOptions(), array('prompt'=>'-- Select a Type --')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>