<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CouponSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coupons';
if($apply == 1) {
    echo Alert::widget([
        'options' => [
            'class' => 'alert-success fade in',
        ],
        'body' => '<strong>Congratulations!</strong> We got your new coupon.',
    ]);
}
if($apply == 2) {
    echo Alert::widget([
        'options' => [
            'class' => 'alert-warning fade in',
        ],
        'body' => '<strong>Warning!</strong> Something goes wrong.  You may not have enough score',
    ]);
}
?>
<link href="css/coupon.css" rel="stylesheet">
<div class="coupon-index container">

    <h1><?= Html::encode($this->title) ?></h1>
    <h2>Your Score <?= \app\models\User::getScore() ?></h2>
    <?php if(!Yii::$app->user->can('couponEdit')){ ?>
        <?php foreach($coupons as $row) { ?>
            <a href="<?= Url::to(['view', 'id' => $row['id']]) ?>" class="coupon-box">
                <div class="row">
                    <div class="col-sm-7">
                        <h3><?= $row['Coupon_name'] ?></h3>
                        <span>Expire at <?= $row['expireDatetime'] ?></span>
                    </div>
                    <div class="col-sm-3">
                        <span class="score"><?= $row['requireScore'] ?></span>
                        <span>score to get</span>
                    </div>
                    <div class="col-sm-2 text-center">
                        <?php
                        if(\app\models\ParticipantHasCoupon::checkUserHasCoupon($row['id'])) {
                            echo Html::a('Taken', ['apply', 'id'=>$row['id']], ['class' => 'btn btn-warning', 'disabled'=>'disabled']);
                        } else {
                            if(\app\models\User::getScore() < $row['requireScore']) {
                                echo Html::a('Not enough score', ['apply', 'id'=>$row['id']], ['class' => 'btn btn-danger', 'disabled'=>'disabled']);
                            } else {
                                echo Html::a('Get it', ['apply', 'id'=>$row['id']], ['class' => 'btn btn-success']);
                            }
                        }
                        ?>
                    </div>
                </div>
                <hr>
            </a>
        <?php } ?>
    <?php } else { ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <p>
            <?= Html::a('Create Coupon', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'Coupon_name',
                'expireDatetime',
                // 'requireScore',
                // 'image',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php } ?>

</div>
