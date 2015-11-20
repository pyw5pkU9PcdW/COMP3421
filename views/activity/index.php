<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'documentLink',
            'personInCharge',
            // 'lastModifyTime',
            // 'datetime:datetime',
            // 'Venue_id',
            // 'Topic_id',
            // 'ActivityType_id',
            // 'Administrator_id',
            // 'Administrator_User_id',
            // 'Administrator_User_Participant_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
