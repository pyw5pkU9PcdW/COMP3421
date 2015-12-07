<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conference Schedule';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->user->can('activityCreate')) { ?>
        <p>
            <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']); ?>
        </p>
    <?php } ?>

    <?php if(!Yii::$app->user->can('activityEdit')) { ?>
            <?php foreach($schedule as $row) { ?>
                    <a href="?r=activity/view&id=<?= $row['id'] ?>" class="activity-schedule">
                        <table class="table">
                            <tr>
                                <td class="activity-schedule-date">
                                    <span class="date"><?= date("M d D", strtotime($row['startDatetime'])) ?></span><br>
                                    <span class="time"><?= date("g:i A", strtotime($row['startDatetime'])) ?></span>
                                </td>
                                <td class="activity-schedule-detail" style="border-left-color: <?= \app\models\ActivityType::getActivityTypeThemeColorById($row['ActivityType_id']) ?>">
                                    <span class="title"><?= $row['Activity_name'] ?></span><br>
                                    <span class="type"><?= \app\models\ActivityType::getActivityTypeNameById($row['ActivityType_id']) ?></span>
                                </td>
                                <td class="activity-schedule-venue"><?= \app\models\Venue::getVenueNameById($row['Venue_id']) ?></td>
                            </tr>
                        </table>
                    </a>
            <?php } ?>
    <?php } else { ?>


        <?php echo $this->render('_search',['model' => $searchModel]); ?>
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'Activity_name',
                // 'lastModifyTime',
                // 'datetime:datetime',
                //'Venue_id',
                [
                    'attribute' => 'Venue_id',
                    'value' => 'venue.name'
                ],
                // 'Topic_id',
                [
                    'attribute' => 'Topic_id',
                    'value' => 'topic.name'
                ],
                //'ActivityType_id',
                [
                    'attribute' => 'ActivityType_id',
                    'value' => 'activityType.ActivityType_name'
                ],
                // 'Administrator_id',
                // 'Administrator_User_id',
                // 'Administrator_User_Participant_id',

                ['class' => 'yii\grid\ActionColumn', 'visible'=>Yii::$app->user->can('activityEdit')],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
        <?php } ?>

</div>
