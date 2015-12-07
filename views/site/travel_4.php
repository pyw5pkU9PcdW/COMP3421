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
    var myCenter=new google.maps.LatLng(22.293274, 114.172812);

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
            content:"Avenue of Stars"
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
                <a  href="#"><img alt="Avenue of Stars" title="Avenue of Stars" width="250" height="147" src="/comp3421/web/../resources/travel/travel_4.jpg" border="0" /></a>
            </td>
            <td>
                <a  href="#">Avenue of Stars</a>
                <br>
                Entering from Salisbury Garden, a 4.5-metre-tall replica of the statuette given to winners at the Hong Kong Film Awards greets visitors. Along the 440-metre promenade, the story of Hong Kong's one hundred years of cinematic history is told through inscriptions printed on nine red pillars. Set into the promenade are plaques honouring the celebrities.

            </td>
        </tr>


</table>
    </div>

<div id="googleMap" style="width:100%;height:380px;"></div>

    <code><?= __FILE__ ?></code>
</div>