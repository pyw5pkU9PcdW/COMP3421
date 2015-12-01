<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Venue */

$this->title = 'Update Venue: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Venues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'VenueType_id' => $model->VenueType_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="venue-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
