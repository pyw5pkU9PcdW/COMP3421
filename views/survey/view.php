<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Survey */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Surveys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]);
        foreach($questionModels as $index => $row){
            if($row->required == 1) {
                $field = '['.$index.']temp_input_required';
            } else {
                $field = '['.$index.']temp_input';
            }
            if($row->temp_type == 0) {
    ?>
                <?= $form->field($row, $field)->textInput(['maxlength' => true])->label($row->content) ?>
            <?php } ?>
            <?php if($row->temp_type == 1) { ?>
                <?= $form->field($row, $field)->checkboxList(\app\models\Checkbutton::getAllOptionsByQuestionId($row->id))->label($row->content) ?>
            <?php } ?>
            <?php if($row->temp_type == 2) { ?>
                <?= $form->field($row, $field)->radioList(\app\models\Radiobutton::getAllOptionsByQuestionId($row->id))->label($row->content) ?>
            <?php } ?>
    <?php } ?>

    <?php if(Yii::$app->user->can('surveyEdit')){ ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id, 'Administrator_id' => $model->Administrator_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id, 'Administrator_id' => $model->Administrator_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?php if($model->is_enable == 0) { ?>
                <?= Html::a('Enable', ['/survey/enable', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?php } else { ?>
                <?= Html::a('Disable', ['/survey/disable', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?php } ?>

        </p>
    <?php } else { ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end(); ?>

</div>
