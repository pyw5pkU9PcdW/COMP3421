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
        <?= Html::a('Update', ['update', 'Participant_id' => $model->Participant_id, 'Activity_id' => $model->Activity_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Participant_id' => $model->Participant_id, 'Activity_id' => $model->Activity_id], [
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
            'attendance',
        ],
    ]) ?>

</div>
