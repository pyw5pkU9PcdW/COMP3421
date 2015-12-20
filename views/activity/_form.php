<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Activity_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'documentLink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'personInCharge')->dropDownList(\app\models\User::getAllUsersOptions(), array('prompt'=>'-- Select a User --')) ?>

    <?= $form->field($model, 'startDatetime')->widget(DateTimePicker::className(), [
        'language' => 'en',
        //'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => false,
        'clientOptions' => [
            'startDate'=> date("Y-m-d"),
            'autoclose' => true,
            'linkFormat' => 'yyyy-mm-dd hh:ii:ss' // if inline = true

        ]
    ]);?>

    <?= $form->field($model, 'endDatetime')->widget(DateTimePicker::className(), [
        'language' => 'en',
        //'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => false,
        'clientOptions' => [
            'startDate'=> date("Y-m-d"),
            'endDate'=> date("2017-01-01"),
            'autoclose' => true,
            'linkFormat' => 'yyyy-mm-dd hh:ii:ss'// if inline = true
        ]
    ]);?>

    <?= $form->field($model, 'Venue_id')->dropDownList(\app\models\Venue::getVenueOptions(), array('prompt'=>'-- Select a Venue --')) ?>

    <?= $form->field($model, 'Topic_id')->dropDownList(\app\models\Topic::getTopicOptions(), array('prompt'=>'-- Select a Topic --')) ?>

    <?= $form->field($model, 'ActivityType_id')->dropDownList(\app\models\ActivityType::getActivityTypeOptions(), array('prompt'=>'-- Select a Type --')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
