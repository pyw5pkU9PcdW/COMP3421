<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserBibi */

$this->title = \app\models\User::getUserFullNameById($model->User_id);
?>
<div class="user-bibi-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->user->can('userBibiEdit')) { ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php } ?>

    <div class="col-sm-8">
        <p><?= $model->description ?></p>
        <h2>Activities in Charge</h2>
        <?php foreach($schedule as $row) { ?>
            <a href="?r=activity/view&id=<?= $row['id'] ?>" class="activity-schedule activity-schedule-index">
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
        <a href="../resources/userbibi/<?= $model->id ?>.pdf" target="_blank" class="btn btn-default paper"><span class="glyphicon glyphicon-download-alt"></span> The Paper</a>
    </div>

    <div class="col-sm-4 user-pic">
        <img src="../resources/userbibi_pic/<?= $model->id ?>.jpg">
    </div>

</div>

<style>
    .paper{
        margin-top:20px;
        margin-bottom: 20px;
    }
    .user-pic img{
        width: 100%;
        text-align: center;
    }
    @media (max-width: 767px) {
        .user-pic img{
            width: 50%;
        }
    }
</style>
