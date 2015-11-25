<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SurveyHasParticipant */

$this->title = 'Update Survey Has Participant: ' . ' ' . $model->Survey_id;
$this->params['breadcrumbs'][] = ['label' => 'Survey Has Participants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Survey_id, 'url' => ['view', 'Survey_id' => $model->Survey_id, 'Participant_id' => $model->Participant_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="survey-has-participant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
