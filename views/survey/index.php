<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surveys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Survey', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'Administrator_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {result}',
                'buttons' => [
                    'result' => function ($url, $model, $key) {return Yii::$app->user->can('surveyResult') ? Html::a('<span class="glyphicon glyphicon-import"></span>', ['result', 'id'=>$model->id]) : '';}
                ],
            ],
        ],
    ]); ?>

</div>
