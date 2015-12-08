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


<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    var myCenter=new google.maps.LatLng(22.304500, 114.179711);

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
            content:"The Hong Kong Polytechnic University"
        });
        infowindow.open(map,marker);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<h1><?= Html::encode($this->title) ?></h1>
<div class="site-travel">
    <table width = 100%>
            <td>
                <a  href="#"><img alt="The Hong Kong Polytechnic University" title="The Hong Kong Polytechnic University" width="250" height="147" src="/comp3421/web/../resources/travel/travel_1.jpg" border="0" /></a>
            </td>
            <td class = "green">
                <a  href="#">The Hong Kong Polytechnic University</a>
                <br>
                PolyU's main campus has over 20 buildings, many of which are inter-connected. Apart from those named after donors, the buildings are identified in English letters (from block A to Z, without blocks K, O and I). In addition to classrooms, laboratories and other academic facilities, the university provides student hostels, a multi-purpose auditorium, sports, recreational and catering facilities, as well as a bookstore and banks.

            </td>
        </tr>

</table>
    </div>

<div id="googleMap" style="width:100%;height:380px;"></div>

    <code><?= __FILE__ ?></code>
</div>