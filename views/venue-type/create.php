<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VenueType */

$this->title = 'Create Venue Type';
$this->params['breadcrumbs'][] = ['label' => 'Venue Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venue-type-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
