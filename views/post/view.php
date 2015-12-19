<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\bootstrap\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->title;
?>
<link href="css/forum.css" rel="stylesheet">
<div class="post-view container">

    <h1><?= Html::encode($this->title) ?></h1>
    <strong><?= User::getUserFullNameById($model->Participant_id) ?> | </strong>
    <strong><?= $model->datetime ?></strong>
    <p><?= $model->content ?></p>

    <?php if(false) { ?>
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

    <?php /*DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'content',
            'datetime',
            'Participant_id',
            'Topic_id',
        ],
    ])*/ ?>

    <?php if(count($allReplies) > 0) { ?>
        <h2>Replies</h2>
        <table class="table">
            <?php foreach($allReplies as $row) { ?>
                <tr>
                    <td>
                        <h3><?= User::getUserFullNameById($row['Participant_id']) ?></h3>
                        <strong><?= $row['datetime'] ?></strong>
                        <p><?= $row['content'] ?></p>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <h2 class="text-center">No replies on this post</h2>
    <?php } ?>

    <?php
    if($replied) {?>
        <script>$(document).scrollTop($(document).height());</script>
    <?php } ?>
</div>
<div class="reply-container">
    <div class="container">
        <?php $form = ActiveForm::begin(); ?>
        <div class="input-group">
            <?= $form->field($newReply, 'content')->textInput(['maxlength' => true, 'class'=>'form-control reply-field', 'placeholder'=>'Reply...'])->label(false) ?>
            <span class="input-group-btn">
                <?= Html::submitButton('Reply', ['class' => 'btn']) ?>
            </span>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>