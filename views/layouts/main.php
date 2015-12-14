<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
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
    <link href="css/custom_global.css" rel="stylesheet">
    <link href="css/custom_form.css" rel="stylesheet">
    <link href="css/side_nav.css" rel="stylesheet">
    <link href="css/activity_schedule.css" rel="stylesheet">
    <link href="css/custom_nav.css" rel="stylesheet">
    <link href="css/custom_nav_toggle_btn.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Vincent Smart Conference 2016',
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
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Outside Attraction', 'url' => ['/outside-attraction/index']],
            ['label' => 'Schedule', 'url' => ['/activity/index']],
            ['label' => 'Login', 'url' => ['/site/login']]

        ];
    } else {
        $navItems = [
            ['label' => 'User', 'url' => ['/user/index'], 'visible' => Yii::$app->user->can('userIndex')],
            [
                'label' => 'Venue',
                'items' => [
                    ['label' => 'Venue', 'url' => ['/venue/index']],
                    ['label' => 'Venue Type', 'url' => ['/venue-type/index']],
                ],
            ],
            //['label' => 'VenueType', 'url' => ['/venue-type/index']],
            ['label' => 'Schedule', 'url' => ['/activity/index']],
            ['label' => 'Outside Attraction', 'url' => ['/outside-attraction/index']],
            ['label' => 'Forum', 'url' => ['/post/index']],
            ['label' => 'Feedback', 'url' => ['/survey/index']],
            //['label' => 'ActivityType', 'url' => ['/activity-type/index']],
            //['label' => 'Category', 'url' => ['/category/index']],
            //['label' => 'Topic', 'url' => ['/topic/index']],
            //['label' => 'Paper', 'url' => ['/paper/index']],
            //['label' => 'Coupon', 'url' => ['/coupon/index']],
            //['label' => 'Post', 'url' => ['/post/index']],
            //['label' => 'Survey', 'url' => ['/survey/index']],
            //['label' => 'Announcement', 'url' => ['/announcement/index']],
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
    NavBar::end();
    ?>
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

    $(window).on('scroll', function() {
        if($(window).scrollTop() > 0) {
            $('#navbar-custom-btn-base').addClass( "navbar-custom-btn-base-background");
            $('#w0').addClass( "navbar-background-light");
            $('.navbar-brand').addClass( "navbar-custom-btn-base-background");
        } else {
            $('#navbar-custom-btn-base').removeClass("navbar-custom-btn-base-background");
            $('#w0').removeClass( "navbar-background-light");
            $('.navbar-brand').removeClass( "navbar-custom-btn-base-background");
        }
    });
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
