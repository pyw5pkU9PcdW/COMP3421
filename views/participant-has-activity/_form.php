<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipantHasActivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participant-has-activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Participant_id')->textInput() ?>

    <?= $form->field($model, 'Activity_id')->textInput() ?>

    <?= $form->field($model, 'attendance')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
