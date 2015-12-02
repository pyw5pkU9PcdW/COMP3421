<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Nearby Attractions';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>

    .green {
        background-color: #EAF2D3;
    }

    td, th {
        padding: 3px 0px 2px 7px;
    }

</style>

<script
    src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
    var myCenter=new google.maps.LatLng(22.296874, 114.171975);

    function initialize()
    {
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
            content:"iSQUARE"
        });

        infowindow.open(map,marker);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<h1><?= Html::encode($this->title) ?></h1>
<div class="site-travel">
    <table width = 100%>


        <tr>
            <td>
                <a  href="#"><img alt="iSQUARE" title="iSQUARE" width="250" height="147" src="/comp3421/web/../resources/travel/travel_5.jpg" border="0" /></a>
            </td>
            <td class = "green">
                <a  href="#">iSQUARE</a>
                <br>
                iSQUARE is the first one-stop shopping and entertainment complex linked to Tsim Sha Tsui MTR station. There are Watches & Jewelry, Fashion & Accessories, Beauty & Health, Lifestyle & Entertainment, and Supermarket & Department Store located at the shopping podium. Besides, there is the cinema box — a highlight not to be missed, which houses a total of 5 grand cineplexes, including IMAX Digital Theatre. What’s more, iSQUARE also features multi-national fine-dining restaurants at its iconic tower, bringing customers not only an unparalleled dining experience, but also a mesmerizing view of the Victoria Harbour!

            </td>
        </tr>



</table>
    </div>

<div id="googleMap" style="width:100%;height:380px;"></div>

    <code><?= __FILE__ ?></code>
</div>