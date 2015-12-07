<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OutsideAttractionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Outside Attractions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outside-attraction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Outside Attraction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Outside_Attraction_name',
            'Outside_Attraction_description',
            'Outside_Attraction_let',
            'Outside_Attraction_lng',
            // 'Outside_Attraction_image_file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
