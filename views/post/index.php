<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index container">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table">
        <tr>
            <th>Topic</th>
            <th>Category</th>
            <th>User</th>
            <th>Replies</th>
            <th>Activity</th>
        </tr>
    </table>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'title',
                'label'=>'Topic',
                'format'=>'raw',
                'value'=>function($data) {return Html::a($data->title, ['post/view', 'id'=>$data->id]);}
            ],
            'content',
            [
                'attribute'=>'datetime',
                'label'=>'Activity',
                'format'=>'text',
                'value'=>function($date) {return date_diff(date_create($date->datetime), date_create());}
            ],
            'Participant_id',
            // 'Topic_id',
        ],
    ]); ?>

</div>

