<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Survey Has Participants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-has-participant-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Survey Has Participant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Survey_id',
            'Participant_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
