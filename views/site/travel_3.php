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
    var myCenter=new google.maps.LatLng(22.301032, 114.177553);

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
            content:"Hong Kong Space Museum"
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
                <a  href="#"><img alt="Hong Kong Space Museum" title="Hong Kong Space Museum" width="250" height="147" src="/comp3421/web/../resources/travel/travel_3.jpg" border="0" /></a>
            </td>
            <td class = "green">
                <a  href="#">Hong Kong Space Museum</a>
                <br>
                It is a museum of astronomy and space science in Tsim Sha Tsui. The museum has two wings: east wing and west wing. The former consists of the nucleus of the museum's planetarium, which has an egg-shaped dome structure. Beneath it are the Stanley Ho Space Theatre, the Hall of Space Science, workshops and offices. The west wing houses the Hall of Astronomy, the Lecture Hall, a gift shop and offices.

            </td>
        </tr>


</table>
    </div>

<div id="googleMap" style="width:100%;height:380px;"></div>

    <code><?= __FILE__ ?></code>
</div>