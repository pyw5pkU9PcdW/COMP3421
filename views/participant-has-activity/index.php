<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participant Has Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-has-activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Participant Has Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Participant_id',
            'Activity_id',
            'Activity_Venue_id',
            'Activity_Topic_id',
            'Activity_ActivityType_id',
            // 'attendance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
