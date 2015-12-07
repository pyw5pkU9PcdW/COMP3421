<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/**
 * Created by PhpStorm.
 * User: Ansonmouse
 * Date: 2/12/15
 * Time: 6:31 PM
 */
$this->title = \app\models\User::getUserFirstNameById(Yii::$app->user->id);
?>
<div class="site-myindex container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Your Schedule</h1>
            <?php if(count($schedule) > 0) { ?>
                <?php foreach($schedule as $row) { ?>
                    <a href="?r=activity/view&id=<?= $row['id'] ?>" class="activity-schedule">
                        <table class="table">
                            <tr>
                                <td class="activity-schedule-date activity-schedule-date-sm">
                                    <span class="date"><?= date("M d D", strtotime($row['startDatetime'])) ?></span><br>
                                    <span class="time"><?= date("g:i A", strtotime($row['startDatetime'])) ?></span>
                                </td>
                                <td class="activity-schedule-detail activity-schedule-detail-sm" style="border-left-color: <?= \app\models\ActivityType::getActivityTypeThemeColorById($row['ActivityType_id']) ?>">
                                    <span class="title"><?= $row['name'] ?></span><br>
                                    <span class="type"><?= \app\models\ActivityType::getActivityTypeNameById($row['ActivityType_id']) ?></span>
                                </td>
                                <td class="activity-schedule-venue"><?= \app\models\Venue::getVenueNameById($row['Venue_id']) ?></td>
                            </tr>
                        </table>
                    </a>
                <?php } ?>
            <?php } else { ?>
                <h2 class="text-center">You do not have any activity</h2>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <h1>Forum</h1>
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($newPost, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($newPost, 'content')->textarea(['maxlength' => true]) ?>
            <?= $form->field($newPost, 'Topic_id')->dropDownList(\app\models\Topic::getTopicOptions(), array('prompt'=>'-- Select a Topic --')) ?>

            <div class="form-group">
                <?= Html::submitButton($newPost->isNewRecord ? 'Create' : 'Update', ['class' => $newPost->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

