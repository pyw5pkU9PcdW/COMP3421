<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipantHasActivity */

$this->title = $model->Participant_id;
$this->params['breadcrumbs'][] = ['label' => 'Participant Has Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-has-activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Participant_id' => $model->Participant_id, 'Activity_id' => $model->Activity_id, 'Activity_Venue_id' => $model->Activity_Venue_id, 'Activity_Topic_id' => $model->Activity_Topic_id, 'Activity_ActivityType_id' => $model->Activity_ActivityType_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Participant_id' => $model->Participant_id, 'Activity_id' => $model->Activity_id, 'Activity_Venue_id' => $model->Activity_Venue_id, 'Activity_Topic_id' => $model->Activity_Topic_id, 'Activity_ActivityType_id' => $model->Activity_ActivityType_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Participant_id',
            'Activity_id',
            'Activity_Venue_id',
            'Activity_Topic_id',
            'Activity_ActivityType_id',
            'attendance',
        ],
    ]) ?>

</div>
