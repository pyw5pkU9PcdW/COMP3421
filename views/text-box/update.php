<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TextBox */

$this->title = 'Update Text Box: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Text Boxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="text-box-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
