<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OutsideAttractionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Outside Attractions';
?>
<div class="outside-attraction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if(!Yii::$app->user->can('outsideAttractionEdit')) { ?>
        <link href="css/outside_attraction.css" rel="stylesheet">
        <div class="container-fluid">
            <?php foreach($allAttractions as $row) { ?>
                <div class="outside-attraction">
                    <a href="?r=outside-attraction/view&id=<?= $row['id'] ?>">
                        <table class="table">
                            <tr>
                                <?php $imgLink = '../resources/travel/'.$row['Outside_Attraction_image_file']; ?>
                                <td style="background-image: url(<?= $imgLink ?>)">
                                    <table class="cover">
                                        <tr><td><?= $row['Outside_Attraction_name'] ?></td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </a>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p>
            <?= Html::a('Create Outside Attraction', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'Outside_Attraction_name',
                'Outside_Attraction_description',
                'Outside_Attraction_let',
                'Outside_Attraction_lng',
                // 'Outside_Attraction_image_file',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php } ?>

</div>
