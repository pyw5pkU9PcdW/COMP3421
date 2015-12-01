<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SurveyHasParticipant */

$this->title = 'Create Survey Has Participant';
$this->params['breadcrumbs'][] = ['label' => 'Survey Has Participants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-has-participant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
