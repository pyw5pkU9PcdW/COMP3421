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
<link href="css/attendance.css" rel="stylesheet">
<div class="container">
    <h1>Activity Attendance Records</h1>
    <?php
    foreach($dataProvider as $row) {
        if(intval($row['total']) != 0) {
            $attend = intval((intval($row['attend'])/intval($row['total']))*310);
            $percent = intval((intval($row['attend'])/intval($row['total']))*100);
            if($percent >= 80) {
                $fill = 'rgb(74,110,62)';
            } else {
                if($percent >= 50) {
                    $fill = 'rgb(236,198,95)';
                } else {
                    $fill = 'rgb(160,41,50)';
                }
            }
            $percent .= '%';
        } else {
            $attend = 0;
            $percent = '0%';
        }
        $remain = 310-$attend;
        ?>
        <style>#ct-chart-<?= $row['id'] ?> .ct-series-a .ct-slice-donut{stroke: <?= $fill ?>;}</style>
        <a href="<?= Url::to(['activity/view', 'id' => $row['id']]) ?>" class="record-link">
            <div class="row record-row">
                <div class="col-sm-8">
                    <h2><?= $row['Activity_name'] ?></h2>
                    <h3>Date and Time</h3>
                    <?= date("M d D", strtotime($row['datetime'])) ?>
                    <?= date("g:i A", strtotime($row['datetime'])) ?> - <?= date("g:i A", strtotime($row['datetime'])) ?><br>
                    <span class="people-attend-num"><?= $row['attend'] ?>/<?= $row['total'] ?></span>
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
            var pieChart<?= $row['id'] ?> = new Chartist.Pie('#ct-chart-<?= $row['id'] ?>', {
                series: [<?= $attend ?>, <?= $remain ?>]
            }, {
                donut: true,
                donutWidth: 30,
                startAngle: 220,
                total: 400,
                showLabel: false
            });
            pieChart<?= $row['id'] ?>.on('draw', function (data) {
                if(data.type === 'slice') {
                    // Get the total path length in order to use for dash array animation
                    var pathLength = data.element._node.getTotalLength();

                    // Set a dasharray that matches the path length as prerequisite to animate dashoffset
                    data.element.attr({
                        'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
                    });

                    // Create animation definition while also assigning an ID to the animation for later sync usage
                    var animationDefinition = {
                        'stroke-dashoffset': {
                            id: 'anim' + data.index,
                            dur: 300,
                            from: -pathLength + 'px',
                            to:  '0px',
                            easing: Chartist.Svg.Easing.easeOutQuint,
                            // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
                            fill: 'freeze'
                        }
                    };

                    // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
                    if(data.index !== 0) {
                        animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
                    }

                    // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
                    data.element.attr({
                        'stroke-dashoffset': -pathLength + 'px'
                    });

                    // We can't use guided mode as the animations need to rely on setting begin manually
                    // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
                    data.element.animate(animationDefinition, false);
                }
            });
        </script>
    <?php
    }
?>
</div>