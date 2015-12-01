<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RadioButton */

$this->title = 'Update Radio Button: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Radio Buttons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'Question_id' => $model->Question_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="radio-button-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
