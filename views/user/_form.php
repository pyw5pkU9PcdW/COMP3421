<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->dropDownList(\app\models\Title::getTitleOptions(), array('prompt'=>'-- Select a Title --')) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($role, 'name')->dropDownList(\app\models\AuthItem::getRootRoles(), array('prompt'=>'-- Select a User Type --')) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->dropDownList(\app\models\Country::getCountryOptions(), array('prompt'=>'-- Select a Title --')) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_number')->textInput() ?>

    <?= $form->field($model, 'fax_number')->textInput() ?>

    <?= $form->field($model, 'rewardPoint')->textInput() ?>

    <?= $form->field($model, 'payment_status')->textInput() ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
