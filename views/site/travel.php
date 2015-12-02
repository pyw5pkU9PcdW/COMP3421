<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Nearby Attractions';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    #attractions {
        width: 100%;
        border-collapse: collapse;
    }

    #attractions td, #attractions th {
        font-size: 1em;
        border: 1px solid #98bf21;
        padding: 3px 7px 2px 7px;
    }

    #attractions th {
        font-size: 1.1em;
        text-align: left;
        padding-top: 5px;
        padding-bottom: 4px;
        background-color: #A7C942;
        color: #ffffff;
    }

    #attractions tr.alt td {
        color: #000000;
        background-color: #EAF2D3;
    }
</style>

<h1><?= Html::encode($this->title) ?></h1>
<div class="site-travel">
    <table id = "attractions">
            <td>
                <a  href="#"><img alt="The Hong Kong Polytechnic University" title="The Hong Kong Polytechnic University" width="250" height="147" src="/comp3421/web/../resources/travel/travel_1.jpg" border="0" /></a>
            </td>
            <td>
                <a  href="#">The Hong Kong Polytechnic University</a>
                <br>
                PolyU's main campus has over 20 buildings, many of which are inter-connected. Apart from those named after donors, the buildings are identified in English letters (from block A to Z, without blocks K, O and I). In addition to classrooms, laboratories and other academic facilities, the university provides student hostels, a multi-purpose auditorium, sports, recreational and catering facilities, as well as a bookstore and banks.
                <br>
                <a href="#" class="more_link" style="width:auto;">More ></a>
            </td>
        </tr>

        <tr>
            <td>
                <a  href="#"><img alt="Hong Kong Science Museum" title="Hong Kong Science Museum" width="250" height="147" src="/comp3421/web/../resources/travel/travel_2.jpg" border="0" /></a>
            </td>
            <td>
                <a  href="#">Hong Kong Science Museum</a>
                <br>
                The science-themed museum hand-on, with over 500 interactive exhibits ranging over a variety of topics such as robotics and virtual reality. Through presenting quality exhibitions and fun science programmes in an enjoyable environment, the Museum serves to popularize science to the public and support science education in schools.
                <br>
                <a href="#" class="more_link" style="width:auto;">More ></a>
            </td>
        </tr>

        <tr>
            <td>
                <a  href="#"><img alt="Hong Kong Space Museum" title="Hong Kong Space Museum" width="250" height="147" src="/comp3421/web/../resources/travel/travel_3.jpg" border="0" /></a>
            </td>
            <td>
                <a  href="#">Hong Kong Space Museum</a>
                <br>
                It is a museum of astronomy and space science in Tsim Sha Tsui. The museum has two wings: east wing and west wing. The former consists of the nucleus of the museum's planetarium, which has an egg-shaped dome structure. Beneath it are the Stanley Ho Space Theatre, the Hall of Space Science, workshops and offices. The west wing houses the Hall of Astronomy, the Lecture Hall, a gift shop and offices.
                <br>
                <a href="#" class="more_link" style="width:auto;">More ></a>
            </td>
        </tr>
        <tr>
            <td>
                <a  href="#"><img alt="Avenue of Stars" title="Avenue of Stars" width="250" height="147" src="/comp3421/web/../resources/travel/travel_4.jpg" border="0" /></a>
            </td>
            <td>
                <a  href="#">Avenue of Stars</a>
                <br>
                Entering from Salisbury Garden, a 4.5-metre-tall replica of the statuette given to winners at the Hong Kong Film Awards greets visitors. Along the 440-metre promenade, the story of Hong Kong's one hundred years of cinematic history is told through inscriptions printed on nine red pillars. Set into the promenade are plaques honouring the celebrities.
                <br>
                <a href="#" class="more_link" style="width:auto;">More ></a>
            </td>
        </tr>

        <tr>
            <td>
                <a  href="#"><img alt="iSQUARE" title="iSQUARE" width="250" height="147" src="/comp3421/web/../resources/travel/travel_5.jpg" border="0" /></a>
            </td>
            <td>
                <a  href="#">iSQUARE</a>
                <br>
                iSQUARE is the first one-stop shopping and entertainment complex linked to Tsim Sha Tsui MTR station. There are Watches & Jewelry, Fashion & Accessories, Beauty & Health, Lifestyle & Entertainment, and Supermarket & Department Store located at the shopping podium. Besides, there is the cinema box — a highlight not to be missed, which houses a total of 5 grand cineplexes, including IMAX Digital Theatre. What’s more, iSQUARE also features multi-national fine-dining restaurants at its iconic tower, bringing customers not only an unparalleled dining experience, but also a mesmerizing view of the Victoria Harbour!
                <br>
                <a href="#" class="more_link" style="width:auto;">More ></a>
            </td>
        </tr>

        <tr>
            <td>
                <a  href="#"><img alt="Harbour Cityn" title="Harbour City" width="250" height="147" src="/comp3421/web/../resources/travel/travel_6.jpg" border="0" /></a>
            </td>
            <td>
                <a  href="#">Harbour City</a>
                <br>
                Harbour City is a one-stop shopping paradise with over 450 shops, 50 food & beverage outlets, two cinemas, three hotels, 10 office buildings, two serviced apartments and a luxurious private club all under one roof. With the “Star” Ferry pier, its home to cruise liner berths, maritime history and fabulous harbour view – all at its doorstep. It is easy to see where the mall drew the inspiration for its name.
                <br>
                <a href="#" class="more_link" style="width:auto;">More ></a>
            </td>
        </tr>

</table>
    </div>


    <code><?= __FILE__ ?></code>
</div>