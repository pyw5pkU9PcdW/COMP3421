<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipantHasActivity */

$this->title = 'Update Participant Has Activity: ' . ' ' . $model->Participant_id;
$this->params['breadcrumbs'][] = ['label' => 'Participant Has Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Participant_id, 'url' => ['view', 'Participant_id' => $model->Participant_id, 'Activity_id' => $model->Activity_id, 'Activity_Venue_id' => $model->Activity_Venue_id, 'Activity_Topic_id' => $model->Activity_Topic_id, 'Activity_ActivityType_id' => $model->Activity_ActivityType_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="participant-has-activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
