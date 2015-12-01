<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */


$this->title = $model->name;
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="activity-view">
    <?php if(!Yii::$app->user->can('activityEdit')) { ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-1">

                </div>
                <div class="col-sm-2" style="height: 100%; background-color: #0097cf">
                    bye
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
