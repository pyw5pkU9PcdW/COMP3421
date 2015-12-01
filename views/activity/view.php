<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */


$this->title = $model->name;
?>
<div class="activity-view">
    <?php if(!Yii::$app->user->can('activityEdit')) { ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <p><?= $model->description ?></p>
                </div>
                <div class="col-sm-4 activity-detail-technical" style="background-color: <?= \app\models\ActivityType::getActivityTypeThemeColorById($model->ActivityType_id) ?>">
                    <?= Html::a('Join Now', ['join', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <h3>Date and Time</h3>
                    <?= date("M d D", strtotime($model->startDatetime)) ?><br>
                    <?= date("g:i A", strtotime($model->startDatetime)) ?> - <?= date("g:i A", strtotime($model->endDatetime)) ?>
                    <h3>Venue</h3>
                    <?= \app\models\Venue::getVenueNameById($model->Venue_id) ?>
                    <h3>Person in Charge</h3>
                    <?= \app\models\User::getUserFullNameById($model->personInCharge) ?>
                </div>
            </div>
        </div>
    <?php } else {
        $this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
        $this->params['breadcrumbs'][] = $this->title;
        ?>
        <div class="container">
            <h1><?= Html::encode($this->title) ?></h1>
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

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'description',
                    'documentLink',
                    'personInCharge',
                    'lastModifyTime',
                    'startDatetime:datetime',
                    'Venue_id',
                    'Topic_id',
                ],
            ]) ?>
        </div>
    <?php } ?>

</div>
