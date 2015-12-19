<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Coupon */

$this->title = $model->Coupon_name;
?>
<div class="coupon-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->user->can('couponEdit')) { ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php } ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Coupon_name',
            'Coupon_description',
            'expireDatetime',
            'requireScore',
        ],
    ]) ?>
    <?php
    if(\app\models\ParticipantHasCoupon::checkUserHasCoupon($model->id)) {
        echo Html::a('Taken', ['apply', 'id'=>$model->id], ['class' => 'btn btn-warning', 'disabled'=>'disabled']);
    } else {
        if(\app\models\User::getScore() < $model->requireScore) {
            echo Html::a('Not enough score', ['apply', 'id'=>$model->id], ['class' => 'btn btn-danger', 'disabled'=>'disabled']);
        } else {
            echo Html::a('Get it', ['apply', 'id'=>$model->id], ['class' => 'btn btn-success']);
        }
    }
    ?>

</div>
