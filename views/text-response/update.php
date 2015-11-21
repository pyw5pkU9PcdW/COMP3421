<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TextResponse */

$this->title = 'Update Text Response: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Text Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'TextBox_id' => $model->TextBox_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="text-response-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
