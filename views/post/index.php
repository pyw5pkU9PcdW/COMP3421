<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forum';
?>
<div class="post-index container">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'title',
                'label'=>'Topic',
                'format'=>'raw',
                'value'=>function($data) {return Html::a($data->title, ['post/view', 'id'=>$data->id]);}
            ],
            [
                'attribute'=>'Topic_id',
                'value'=>'topic.name'
            ],
            [
                'attribute'=>'datetime',
                'label'=>'Activity',
                'format'=>'text',
                'value'=>function($date) {
                    $lastReply = \app\models\PostReplay::getLatestReplyDatetimeByPostId($date->id);
                    if(count($lastReply) > 0 && strtotime($lastReply[0]['datetime']) - strtotime($date->datetime) > 0) {
                        $diff = strtotime('now') - strtotime($lastReply[0]['datetime']);
                    } else {
                        $diff = strtotime('now') - strtotime($date->datetime);
                    }
                    if($diff < 60) {
                        return $diff.' secs ago';
                    } else {
                        if($diff < 3600) {
                            return intval($diff/60).' mins ago';
                        } else {
                            if($diff < 86400) {
                                return intval($diff/3600).' hours ago';
                            } else {
                                return intval($diff/86400).' days ago';
                            }
                        }
                    }
                }
            ],
            [
                'attribute'=>'Participant_id',
                'label'=>'Users',
                'format'=>'text',
                'value'=>function($data) {
                    $appReplies = \app\models\PostReplay::getAllRepliesPeopleByPostId($data->id);
                    $returnString = \app\models\User::getUserFirstNameById($data->Participant_id);
                    foreach($appReplies as $row) {
                        if($row["Participant_id"] != $data->Participant_id) {
                            $returnString .= ', '.\app\models\User::getUserFirstNameById($row["Participant_id"]);
                        }
                    }
                    return $returnString;
                }
            ],
        ],
    ]); ?>

</div>

