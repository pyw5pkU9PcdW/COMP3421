<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CheckButton */

$this->title = 'Update Check Button: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Check Buttons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'Question_id' => $model->Question_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="check-button-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
