<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OutsideAttraction */

$this->title = 'Create Outside Attraction';
$this->params['breadcrumbs'][] = ['label' => 'Outside Attractions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outside-attraction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
