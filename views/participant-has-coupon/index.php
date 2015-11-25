<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participant Has Coupons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-has-coupon-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Participant Has Coupon', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Participant_id',
            'coupon_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
