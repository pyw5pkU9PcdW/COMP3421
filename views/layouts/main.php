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
    <title><?= Html::encode($this->title) ?> | The CONF</title>
    <?php $this->head(); ?>
    <link href="css/side_nav.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div id="wrapper">
        <?php if(true) { ?>
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
    </div>
    <?php
    NavBar::begin([
        'brandLabel' => 'CONF',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
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
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Login', 'url' => ['/site/login']]

        ];
    } else {
        $navItems = [
            ['label' => 'User', 'url' => ['/user/index'], 'visible' => Yii::$app->user->can('userIndex')],
            ['label' => 'Venue', 'url' => ['/venue/index']],
            //['label' => 'VenueType', 'url' => ['/venue-type/index']],
            ['label' => 'Activity', 'url' => ['/activity/index']],
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
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; LU Cheuk Ting, KWAN Leung Yu, KONG Yu Ching, CHENG Hoi Yan  <?= date('Y') ?> • All rights reserved</p>

        <p class="pull-right"><?php //Yii::powered() ?></p>
    </div>
</footer>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
