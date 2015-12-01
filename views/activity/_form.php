<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'documentLink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'personInCharge')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datetime')->widget(DateTimePicker::className(), [
        'language' => 'en',
        //'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => false,
        'clientOptions' => [
            //'startView' => 1,
            //'minView' => 0,
            //'maxView' => 1,
            'autoclose' => true,
            'linkFormat' => 'HH:ii P', // if inline = true
            // 'format' => 'HH:ii P', // if inline = false
            //'todayBtn' => true
        ]
    ]);?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'Venue_id')->dropDownList(\app\models\Venue::getVenueOptions(), array('prompt'=>'-- Select a Venue --')) ?>

    <?= $form->field($model, 'Topic_id')->dropDownList(\app\models\Topic::getTopicOptions(), array('prompt'=>'-- Select a Topic --')) ?>

    <?= $form->field($model, 'ActivityType_id')->dropDownList(\app\models\ActivityType::getActivityTypeOptions(), array('prompt'=>'-- Select a Type --')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
