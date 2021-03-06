<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'globalSearch') ?>

    <?php //$form->field($model, 'id') ?>

    <?php //$form->field($model, 'name') ?>

    <?php //$form->field($model, 'description') ?>

    <?php //$form->field($model, 'documentLink') ?>

    <?php //$form->field($model, 'personInCharge') ?>

    <?php // echo $form->field($model, 'lastModifyTime') ?>

    <?php // echo $form->field($model, 'startDatetime') ?>

    <?php // echo $form->field($model, 'endDatetime') ?>

    <?php // echo $form->field($model, 'Venue_id') ?>

    <?php // echo $form->field($model, 'Topic_id') ?>

    <?php // echo $form->field($model, 'ActivityType_id') ?>

    <?php // echo $form->field($model, 'Administrator_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
