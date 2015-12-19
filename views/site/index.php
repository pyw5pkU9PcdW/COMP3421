<?php

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<link href="css/index.css" rel="stylesheet">
<div class="site-index container-fluid">
    <div class="parallax-container top-bar jumbo-height top" style="background-image: url(../resources/static/hk_night.jpg)">
        <div class="title">
            <h1>VM Smart Conference 2016</h1>
            <h3>Dec 20 - Dec 23 2016</h3>
            <h3>Hong Kong</h3>
        </div>
    </div>
<div class="row part-container text-center">
    <div class="container intro">
        <p>
            VM Smart Conference is an interdisciplinary international conference that invites academics and independent scholars and researchers from around the world to meet and exchange the latest ideas and views in a forum encouraging fruitful dialogue.
        </p>
        <p>
            VM Smart Conference serves as an outstanding platform that gathers professors in all the relevant communities and domains together, an international forum for researchers and industry practitioners to exchange latest fundamental advances in engineering and applied science.
        </p>
        <p>
            Experts and scholars in related domain will discuss academic issues, seize future development opportunities, master the subject developing tendency and exchange the latest researches and academic thinking. Experts, practitioners and policy makers worldwide will present the latest innovations , share the experience and insights, and forecast the trends and opportunities.
        </p>
    </div>
</div>
    <div class="row tech-container">
        <div class="col-sm-6 tech-info">
            <h3>Date: Dec 20 - Dec 23 2016</h3>
            <h3>Venue: Hotel ICON, Hong Kong</h3>
        </div>
        <div class="col-sm-6 googleMap">
            <div id="googleMap"></div>
        </div>
    </div>
    <div class="row">
        <h2>Star Speakers</h2>
        <?php foreach($userBibi as $row) { ?>
            <div class="col-sm-3 user-bibi">

            </div>
        <?php } ?>
    </div>
</div>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    var myCenter=new google.maps.LatLng(22.3004309, 114.1776475);

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
            content:"Hotel ICON"
        });
        infowindow.open(map,marker);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
