<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OutsideAttraction */

$this->title = $model->Outside_Attraction_name;
?>
<link href="css/outside_attraction.css" rel="stylesheet">
<div class="outside-attraction-view">

    <?php if(Yii::$app->user->can('outsideAttractionEdit')) { ?>
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

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1><?= $model->Outside_Attraction_name ?></h1>
                <p class="outside-attraction-description"><?= $model->Outside_Attraction_description ?></p>
                <?= Html::a('Get PDF', ['/outside-attraction/samplepdf', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
                <?php $imgLink = '@web/../resources/travel/'.$model->Outside_Attraction_image_file; ?>
                <p class="text-center"><?= Html::img($imgLink, ['class'=>'outside-attraction-img']);?></p>
            </div>
            <div class="col-sm-6 outside-attraction-map">
                <div id="googleMap"></div>
            </div>
        </div>
    </div>

    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
        var myCenter=new google.maps.LatLng(<?= $model->Outside_Attraction_let ?>, <?= $model->Outside_Attraction_lng ?>);

        function initialize() {
            var mapProp = {
                center:myCenter,
                zoom:17,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

            var marker=new google.maps.Marker({
                position:myCenter,
            });
            marker.setMap(map);
            var infowindow = new google.maps.InfoWindow({
                content:"<?= $model->Outside_Attraction_name ?>"
            });
            infowindow.open(map,marker);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</div>
