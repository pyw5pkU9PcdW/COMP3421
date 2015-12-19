<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


//set it to writable location, a place for temp generated PNG files
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

//html PNG location prefix
$PNG_WEB_DIR = '../views/layouts/temp/';

include "qrlib.php";

if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);

AppAsset::register($this);

$filename = $PNG_TEMP_DIR.'test.png';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | VSC 2016</title>
    <?php $this->head(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link href="css/custom_global.css" rel="stylesheet">
    <link href="css/custom_form.css" rel="stylesheet">
    <link href="css/side_nav.css" rel="stylesheet">
    <link href="css/activity_schedule.css" rel="stylesheet">
    <link href="css/custom_nav.css" rel="stylesheet">
    <link href="css/notification.css" rel="stylesheet">
    <link href="css/custom_nav_toggle_btn.css" rel="stylesheet">
</head>
<body>
<?php //echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';?>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'VM Smart Conference 2016',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top navbar_custom',
        ],
    ]);

    echo '<div class="container"><div class="row"><form class="navbar-form custom-form" role="search">
            <div class="input-group" style="margin-left: auto; margin-right: auto; width: 30%">
                <input type="text" id="search-field" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" id="search-btn" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </span>
            </div>
           </form></div></div>';

    /*
    $navItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
        ['label' => 'User', 'url' => ['/user/index']],
        Yii::$app->user->isGuest ?
            ['label' => 'Login', 'url' => ['/site/login']] :
            [
                'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
    ];
    */
    if(Yii::$app->user->isGuest) {
        $navItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Outside Attraction', 'url' => ['/outside-attraction/index']],
            ['label' => 'Schedule', 'url' => ['/activity/index']],
            ['label' => 'Login', 'url' => ['/site/login']]

        ];
    } else {
        $navItems = [
            ['label' => 'User', 'url' => ['/user/index'], 'visible' => Yii::$app->user->can('userIndex')],
            //['label' => 'VenueType', 'url' => ['/venue-type/index']],
            ['label' => 'Schedule', 'url' => ['/activity/index']],
            ['label' => 'Outside Attraction', 'url' => ['/outside-attraction/index']],
            ['label' => 'Forum', 'url' => ['/post/index']],
            ['label' => 'Feedback', 'url' => ['/survey/index']],
            //['label' => 'Paper', 'url' => ['/paper/index']],
            //['label' => 'Post', 'url' => ['/post/index']],
            //['label' => 'Survey', 'url' => ['/survey/index']],
            ['label' => 'Attendance', 'url' => ['/activity/record'], 'visible' => Yii::$app->user->can('activityRecord')],
            ['label' => 'Announcement', 'url' => ['/announcement/index'], 'visible' => Yii::$app->user->can('announcementIndex')],
            [
                'label' => 'Venue Management',
                'items' => [
                    ['label' => 'Venue', 'url' => ['/venue/index'], 'visible' => Yii::$app->user->can('venueIndex')],
                    ['label' => 'Venue Type', 'url' => ['/venue-type/index'], 'visible' => Yii::$app->user->can('venueTypeIndex')],
                ],
                'visible' => Yii::$app->user->can('venueIndex')
            ],
            [
                'label' => 'Topic/Category Management',
                'items' => [
                    ['label' => 'Topic', 'url' => ['/topic/index'], 'visible' => Yii::$app->user->can('topicIndex')],
                    ['label' => 'Category', 'url' => ['/category/index'], 'visible' => Yii::$app->user->can('categoryIndex')],
                ],
                'visible' => Yii::$app->user->can('topicIndex')
            ],
            ['label' => 'Coupon', 'url' => ['/coupon/index']],
            ['label' => 'Speaker Display', 'url' => ['/user-bibi/index'], 'visible' => Yii::$app->user->can('userBibiIndex')],
            //['label' => 'Question', 'url' => ['/question/index']],
            //['label' => 'Message', 'url' => ['/message/index']],
            //['label' => 'Radio Button', 'url' => ['/radio-button/index']],
            //['label' => 'Check Button', 'url' => ['/check-button/index']],
            //['label' => 'Textbox', 'url' => ['/text-box/index']],
            //['label' => 'Text Response', 'url' => ['/Text-Response/index']],
            //['label' => 'Participant', 'url' => ['/participant/index']],

            [
                'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $navItems,
    ]);
    echo '<div id="navbar-custom-btn-base"><div id="navbar-custom-toggle-btn">
            <span></span>
            <span></span>
            <span></span>
          </div></div>';


    if(!Yii::$app->user->isGuest) {
        echo '<div class="notification-dropdown-container">
                <button class="btn btn-default dropdown-toggle" type="button" id="notification-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
                    <span class="badge" id="notification-counter"></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" id="notification-dropdown">
                </ul>
            </div>';
    }

    if(Yii::$app->user->can('qrCodeGenerate')) {
        //processing qr code data
        $errorCorrectionLevel = 'L';
        $matrixPointSize = 4;

        if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
            $errorCorrectionLevel = $_REQUEST['level'];

        if (isset($_REQUEST['size']))
            $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);

        $activity = \app\models\Activity::getNextActivity();
        if (!(Yii::$app->user->isGuest) && $activity != false) {
            // user data
            QRcode::png('https://comp3421-3-ansonmouse1-1.c9users.io/web/index.php?r=participant-has-activity/attend&id='.Yii::$app->user->identity->getId().'&activity='.$activity['id'].'&user=admin&token=admin' , $filename, $errorCorrectionLevel, $matrixPointSize, 2);
            echo '<div class="qrCode">
                    <img src="'.$PNG_WEB_DIR.basename($filename).'"><br>
                    Token for activity at<br> '.$activity['startDatetime'].'
                  </div>';
        }
    }

    NavBar::end();
    ?>
    <style>
        .qrCode{
            width: 100%;
            text-align: center;
            margin-top: 30px;
        }
        .qrCode img{
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <div class="container-fluid" style="margin-top: 70px">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <strong>LU</strong> Cheuk Ting, <strong>KWAN</strong> Leung Yu, <strong>KONG</strong> Yu Ching, <strong>CHENG</strong> Hoi Yan  <?= date('Y') ?> • All rights reserved</p>

        <p class="pull-right"><?php //Yii::powered() ?></p>
    </div>
</footer>

<script>
    $("#navbar-custom-btn-base").click(function(e) {
        e.preventDefault();
        $('#navbar-custom-toggle-btn').toggleClass('toggle');
        $(".navbar_custom .navbar-collapse.collapse").toggleClass("navbar-custom-toggle");
        if($('#navbar-custom-toggle-btn').hasClass('light-btn')) {
            $("#navbar-custom-toggle-btn span").toggleClass('light');
        }
    });

    $("#search-btn").click(function(e) {
        e.preventDefault();
        if($("#search-field").val().length > 0) {
            window.location.href = "?r=search/index&search="+$("#search-field").val();
        }
    });

    $('#navbar-custom-btn-base').addClass( "navbar-custom-btn-base-background");
    $('#w0').addClass( "navbar-background-light");
    $('.navbar-brand').addClass( "navbar-custom-btn-base-background");

    /*$(window).on('scroll', function() {
        if($(window).scrollTop() > 0) {
            $('#navbar-custom-btn-base').addClass( "navbar-custom-btn-base-background");
            $('#w0').addClass( "navbar-background-light");
            $('.navbar-brand').addClass( "navbar-custom-btn-base-background");
        } else {
            $('#navbar-custom-btn-base').removeClass("navbar-custom-btn-base-background");
            $('#w0').removeClass( "navbar-background-light");
            $('.navbar-brand').removeClass( "navbar-custom-btn-base-background");
        }
    });*/

    <?php if(!Yii::$app->user->isGuest) { ?>

    updateNotification();
    var notificationChecker = setInterval(function() {
        if($('#notification-btn').attr('aria-expanded') == 'false') {
            updateNotification();
        }
    }, 2000);
    var notificationObj;

    $('#notification-btn').click(function() {
        notificationChecker = null;
        if(notificationObj != null) {
            for(var i = 0; i < notificationObj.length; i++) {
                markNotificationAsRead(notificationObj[i].type, notificationObj[i].modelId, notificationObj[i].id);
            }
            notificationObj = null;
        }
    });

    function updateNotification() {
        $('#notification-dropdown').empty();
        $.ajax({
            url: '<?= Url::to(['notification/get-notifications']) ?>',
            dataType: 'json',
            type: 'post',
            data: {
                id: <?= Yii::$app->user->id ?>,
                _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
            }
        }).done(function(data) {
            notificationObj = data;
            for(var i = 0; i < data.length; i++) {
                if(data[i].type == 'post') {
                    var id = data[i].id
                } else {
                    var id = data[i].modelId;
                }
                notificationConstructor(data[i].type, id, data[i].content, data[i].datetime);
            }
            if(data.length > 0) {
                if(data.length != $('#notification-counter').text()) {
                    $('#notification-counter').empty();
                    $('#notification-counter').append(data.length);
                }
            } else {
                $('#notification-counter').empty();
                $('#notification-dropdown').append('<strong>No new notification</strong>');
            }
        });
    }

    function notificationConstructor(type, id, content, time) {
        var li =
            '<li>' +
            '<a href="/comp3421/web/index.php?r='+type+'/view&id='+id+'">' +
            //content +
            '<div class="notification-content">' +
            '<p>'+content+'</p>' +
            '<span>'+time+'</span>' +
            '</div>' +
            '</a>' +
            '</li>'
        $('#notification-dropdown').append(li);
    }

    function markNotificationAsRead(type, modelId, id) {
        $.ajax({
            url: '<?= Url::to(['notification/mark-notification-read']) ?>',
            dataType: 'html',
            type: 'post',
            data: {
                id: id,
                modelId: modelId,
                type: type,
                _csrf: '<?= Yii::$app->request->getCsrfToken() ?>'
            }
        }).done(function(data) {

        });
    }

    <?php } ?>

</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
