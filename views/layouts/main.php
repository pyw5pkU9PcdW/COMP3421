<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
    <link href="css/side_nav.css" rel="stylesheet">
    <link href="css/activity_schedule.css" rel="stylesheet">
    <link href="css/custom_nav.css" rel="stylesheet">
    <link href="css/custom_nav_toggle_btn.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
        <?php if(false) { ?>
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <input class="rounded" type="text" name="username" placeholder="Username">
                </li>
                <li>
                    <input class="rounded" type="text" name="password" placeholder="Password">
                </li>

                <li>
                    <a href="#" class="btn_login">LOGIN</a>
                </li>
                <li>
                    <a href="#" class="btn_registration">Registration</a>
                </li>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Join the Conference</a>
                </li>
                <ol>
                <li>
                    <a href="#">Travel in HK</a>
                </li>
                <li>
                    <a href="#">Come to Conference</a>
                </li>
                <li>
                    <a href="#">Venue Information</a>
                </li>
                </ol>

                <li>
                    <a href="#">Contact Us</a>
                </li>
            </ul>
        </div>
        <?php } ?>
    <?php
    NavBar::begin([
        'brandLabel' => 'Vincent Smart Conference 2016',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top navbar_custom',
        ],
    ]);
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
            ['label' => 'Travel', 'url' => ['/site/travel']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
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
            ['label' => 'Forum', 'url' => ['/post/index']],
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
    NavBar::end();
    ?>
    <div id="navbar-custom-toggle-btn">
        <span></span>
        <span></span>
        <span></span>
    </div>
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
    $("#navbar-custom-toggle-btn").click(function(e) {
        e.preventDefault();
        $(this).toggleClass('toggle');
        $(".navbar_custom .navbar-collapse.collapse").toggleClass("navbar-custom-toggle");
        if($(this).hasClass('light-btn')) {
            $("#navbar-custom-toggle-btn span").toggleClass('light');
        }
    });
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
