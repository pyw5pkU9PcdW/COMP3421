<?php
/**
 * Created by PhpStorm.
 * User: Ansonmouse
 * Date: 19/12/2015
 * Time: 4:41 AM
 */
 use yii\helpers\Url;
$this->title = 'Attendance Record';
?>
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<script src="../vendor/chartist-threshold/src/scripts/chartist-plugin-threshold.js"></script>
<div class="container">
    <h1>Activity Attendance Records</h1>
    <?php
    foreach($dataProvider as $row) {
        if(intval($row['total']) != 0) {
            $attend = intval((intval($row['attend'])/intval($row['total']))*310);
            $percent = intval((intval($row['attend'])/intval($row['total']))*100).'%';
        } else {
            $attend = 0;
            $percent = '0%';
        }
        $remain = 310-$attend;
        ?>
        <a href="<?= Url::to(['activity/view', 'id' => $row['id']]) ?>">
            <div class="row record-row">
                <div class="col-sm-8">
                    <h2><?= $row['Activity_name'] ?></h2>
                    <span class="people-attend-num"><?= $row['attend'] ?> / <?= $row['total'] ?></span><br>
                    <span class="people-attend">People Attend</span>
                </div>
                <div class="col-sm-4">
                    <div id="ct-chart-<?= $row['id'] ?>" class="ct-chart ct-perfect-fourth ct-frame" style="width: 100%">
                        <span class="attend-percentage"><?= $percent  ?></span>
                    </div>
                </div>
            </div>
            <hr>
        </a>
        <script>
            new Chartist.Pie('#ct-chart-<?= $row['id'] ?>', {
                series: [<?= $attend ?>, <?= $remain ?>]
            }, {
                donut: true,
                donutWidth: 30,
                startAngle: 220,
                total: 400,
                showLabel: false
            });
        </script>
    <?php
    }
?>
</div>