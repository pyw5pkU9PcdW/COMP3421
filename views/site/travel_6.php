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
    var myCenter=new google.maps.LatLng(22.297810, 114.168231);

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
            content:"Harbour City"
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
                <a  href="#"><img alt="Harbour Cityn" title="Harbour City" width="250" height="147" src="/comp3421/web/../resources/travel/travel_6.jpg" border="0" /></a>
            </td>
            <td>
                <a  href="#">Harbour City</a>
                <br>
                Harbour City is a one-stop shopping paradise with over 450 shops, 50 food & beverage outlets, two cinemas, three hotels, 10 office buildings, two serviced apartments and a luxurious private club all under one roof. With the “Star” Ferry pier, its home to cruise liner berths, maritime history and fabulous harbour view – all at its doorstep. It is easy to see where the mall drew the inspiration for its name.

            </td>
        </tr>

</table>
    </div>

<div id="googleMap" style="width:100%;height:380px;"></div>

    <code><?= __FILE__ ?></code>
</div>