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
    var myCenter=new google.maps.LatLng(22.300993,114.177571);

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
            content:"Hong Kong Science Museum"
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
                <a  href="#"><img alt="Hong Kong Science Museum" title="Hong Kong Science Museum" width="250" height="147" src="/comp3421/web/../resources/travel/travel_2.jpg" border="0" /></a>
            </td>
            <td>
                <a  href="#">Hong Kong Science Museum</a>
                <br>
                The science-themed museum hand-on, with over 500 interactive exhibits ranging over a variety of topics such as robotics and virtual reality. Through presenting quality exhibitions and fun science programmes in an enjoyable environment, the Museum serves to popularize science to the public and support science education in schools.

            </td>
        </tr>


</table>
    </div>

<div id="googleMap" style="width:100%;height:380px;"></div>

    <code><?= __FILE__ ?></code>
</div>