<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserBibi */

$this->title = 'Update User Bibi: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Bibis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-bibi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
