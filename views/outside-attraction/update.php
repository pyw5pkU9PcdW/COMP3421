<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OutsideAttraction */

$this->title = 'Update Outside Attraction: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Outside Attractions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="outside-attraction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
