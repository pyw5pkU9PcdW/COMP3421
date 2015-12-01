<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipantHasCoupon */

$this->title = 'Update Participant Has Coupon: ' . ' ' . $model->Participant_id;
$this->params['breadcrumbs'][] = ['label' => 'Participant Has Coupons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Participant_id, 'url' => ['view', 'Participant_id' => $model->Participant_id, 'coupon_id' => $model->coupon_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="participant-has-coupon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
