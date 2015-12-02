<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
                                    <span class="title"><?= $row['name'] ?></span><br>
                                    <span class="type"><?= \app\models\ActivityType::getActivityTypeNameById($row['ActivityType_id']) ?></span>
                                </td>
                                <td class="activity-schedule-venue"><?= \app\models\Venue::getVenueNameById($row['Venue_id']) ?></td>
                            </tr>
                        </table>
                    </a>
            <?php } ?>
    <?php } else { ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name',
                'description',
                // 'lastModifyTime',
                // 'datetime:datetime',
                'Venue_id',
                // 'Topic_id',
                'ActivityType_id',
                // 'Administrator_id',
                // 'Administrator_User_id',
                // 'Administrator_User_Participant_id',

                ['class' => 'yii\grid\ActionColumn', 'visible'=>Yii::$app->user->can('activityEdit')],
            ],
        ]); ?>
    <?php } ?>

</div>
