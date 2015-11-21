<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TextResponse */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Text Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-response-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'TextBox_id' => $model->TextBox_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'TextBox_id' => $model->TextBox_id], [
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
            'content',
            'TextBox_id',
        ],
    ]) ?>

</div>
