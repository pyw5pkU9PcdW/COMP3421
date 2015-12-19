<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Coupon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Coupon_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Coupon_description')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'expireDatetime')->widget(DateTimePicker::className(), [
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

    <?= $form->field($model, 'requireScore')->textInput() ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
