<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedback';
if($done) {
    echo Alert::widget([
        'options' => [
            'class' => 'alert-success fade in',
        ],
        'body' => '<strong>Thank You!</strong> We got your feedback and you have earned <strong>5</strong> marks.<br>See what can get as <strong><a href="'.Url::to('coupon/index').'">Coupons</a></strong>',
    ]);
}
?>
<div class="survey-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->user->can('surveyCreate')) { ?>
        <p>
            <?= Html::a('Create Survey', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php } ?>

    <?php if(!Yii::$app->user->can('surveyEdit')) {
        foreach($surveys as $row) {
            if(!\app\models\SurveyHasParticipant::checkParticipantHasDone($row['id'])) {
                ?>
                <a href="<?= Url::to(['view', 'id'=>$row['id']]) ?>">
                    <table class="table">
                        <tr>
                            <td>
                                <h3><?= $row['title'] ?></h3>
                            </td>
                        </tr>
                    </table>
                </a>
                <?php
            }
        }
        ?>

    <?php } else { ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {result} {delete}',
                    'buttons' => [
                        'result' => function ($url, $model, $key) {return Yii::$app->user->can('surveyResult') ? Html::a('<span class="glyphicon glyphicon-import"></span>', ['result', 'id'=>$model->id]) : '';},
                    ],
                ],
            ],
        ]); ?>
    <?php } ?>

</div>
