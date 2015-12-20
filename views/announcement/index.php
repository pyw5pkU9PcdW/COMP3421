<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnnouncementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Announcements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announcement-index container">

    <?php Pjax::begin() ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if(Yii::$app->user->can('announcementCreate')){ ?>
        <p>
            <?= Html::a('Create Announcement', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php } ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'title',
                'format'=>'raw',
                'value'=>function($data) {return Html::a($data->title, ['announcement/view', 'id'=>$data->id]);}
            ],
            'datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'visible' => Yii::$app->user->can('announcementEdit'),
            ],
        ],
    ]); ?>
    <?php Pjax::end() ?>

</div>
