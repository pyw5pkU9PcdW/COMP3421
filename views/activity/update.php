<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = 'Update Activity: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'Venue_id' => $model->Venue_id, 'Topic_id' => $model->Topic_id, 'ActivityType_id' => $model->ActivityType_id, 'Administrator_id' => $model->Administrator_id, 'Administrator_User_id' => $model->Administrator_User_id, 'Administrator_User_Participant_id' => $model->Administrator_User_Participant_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
