<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VenueType */

$this->title = 'Update Venue Type: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Venue Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="venue-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
