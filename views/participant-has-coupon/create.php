<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ParticipantHasCoupon */

$this->title = 'Create Participant Has Coupon';
$this->params['breadcrumbs'][] = ['label' => 'Participant Has Coupons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-has-coupon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
