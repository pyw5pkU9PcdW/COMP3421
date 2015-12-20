<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Venue */

$this->title = 'Create Venue';
$this->params['breadcrumbs'][] = ['label' => 'Venues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venue-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
