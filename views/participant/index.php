<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Participant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'address',
            'city',
            'country',
            // 'department',
            // 'organization',
            // 'mobile_number',
            // 'fax_number',
            // 'rewardPoint',
            // 'payment_status',
            // 'remark',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
