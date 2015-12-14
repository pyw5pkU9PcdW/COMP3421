<?php
/**
 * Created by PhpStorm.
 * User: patrina
 * Date: 2/12/15
 * Time: 5:15 PM
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'Venue_id') ?>

    <?= $form->field($model, 'ActivityType_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>
</div>
