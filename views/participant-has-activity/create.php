<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ParticipantHasActivity */

$this->title = 'Create Participant Has Activity';
$this->params['breadcrumbs'][] = ['label' => 'Participant Has Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-has-activity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
