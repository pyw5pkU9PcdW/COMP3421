<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyHasParticipant */

$this->title = $model->Survey_id;
$this->params['breadcrumbs'][] = ['label' => 'Survey Has Participants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-has-participant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Survey_id' => $model->Survey_id, 'Participant_id' => $model->Participant_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Survey_id' => $model->Survey_id, 'Participant_id' => $model->Participant_id], [
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
            'Survey_id',
            'Participant_id',
        ],
    ]) ?>

</div>
