<?php
/**
 * Created by PhpStorm.
 * User: patrina
 * Date: 15/12/15
 * Time: 1:46 PM
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Survey */

$this->title = $model->title;
?>
<!-- Site content goes here !-->

<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
<link href="css/survey_visualization.css" rel="stylesheet">

<div class="survey-result container">
    <h1><?= $model->title ?></h1>
    <h3><strong><?= $doneCount ?></strong> participants has done</h3>
        <?php
            foreach ($dataProvider as $key=>$row) {
                echo '<div class="panel-group">';
                echo '<div class="panel panel-default">';
                echo '<a data-toggle="collapse" href="#collapse'.$row['id'].'" id="panel-group-'.$row['id'].'">';
                echo '<div class="panel-heading">';
                echo ($key+1).'. '.$row['question'];
                echo '</div>';
                echo '<div id="collapse'.$row['id'].'" class="panel-collapse collapse">';
                echo '<div class="panel-body">';
                if($row['type'] == 0) {
                    echo '<table class="table"><tr><th>#</th><th>Response</th></tr>';
                    for($i = 0; $i < count($row['results']); $i++) {
                        echo '<tr>';
                        echo '<td>'.($i+1).'</td>';
                        echo '<td>'.$row['results'][$i].'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
                if($row['type'] == 1) {
                    echo '<div id="ct-chart-'.$row['id'].'" class="ct-chart ct-perfect-fourth ct-frame"></div>';
                    $content = [];
                    $count = [];
                    for($i = 0; $i < count($row['results']); $i++){
                        array_push($content, $row['results'][$i]['content']);
                        array_push($count, $row['results'][$i]['count']);
                    }
                    ?>
                    <script type='text/javascript'>
                        $('#panel-group-'+<?= $row['id'] ?>).click(function() {
                            if($('#ct-chart-'+<?= $row['id'] ?>).is(':empty')) {
                                var options = {
                                    distributeSeries: true,
                                    divisor: 4,
                                    axisX: {
                                        showGrid: false,
                                        scaleMinSpace: 40,
                                    }
                                };
                                var data = {
                                    labels: <?= json_encode($content) ?>,
                                    series: <?= json_encode($count) ?>
                                };
                                var barChart<?= $row['id'] ?> = new Chartist.Bar('#ct-chart-'+<?= $row['id'] ?>, data, options);

                                var bottom = null;
                                barChart<?= $row['id'] ?>.on('draw', function (data) {
                                    if(data.type == 'grid' && bottom == null) {
                                        bottom = data.y2;
                                    }
                                    if(data.type == 'grid') {
                                        data.element.animate({
                                            opacity: {
                                                dur: 500,
                                                from: 0,
                                                to: 1
                                            }
                                        });
                                    }
                                    if(data.type == 'bar') {
                                        var top = data.y2;
                                        data.element.animate({
                                            opacity: {
                                                dur: 500,
                                                from: 0,
                                                to: 1
                                            },
                                            y2: {
                                                dur: 1000,
                                                from: bottom,
                                                to: top,
                                                easing: 'easeOutQuart'
                                            },
                                        });
                                    }
                                });
                            }
                        });
                    </script>
        <?php
                }
                if($row['type'] == 2) {
                    echo '<div id="ct-chart-'.$row['id'].'" class="ct-chart ct-perfect-fourth ct-frame"></div>';
                    $content = [];
                    $count = [];
                    for($i = 0; $i < count($row['results']); $i++){
                        array_push($content, $row['results'][$i]['content']);
                        array_push($count, $row['results'][$i]['count']);
                    }
        ?>
                <script type='text/javascript'>
                    $('#panel-group-'+<?= $row['id'] ?>).click(function() {
                        if($('#ct-chart-'+<?= $row['id'] ?>).is(':empty')) {
                            var options = {
                                donut: true,
                            };
                            var data = {
                                labels: <?= json_encode($content) ?>,
                                series: <?= json_encode($count) ?>
                            };
                            var responsiveOptions = [
                                ['screen and (min-width: 768px)', {
                                    chartPadding: 30,
                                    labelOffset: 40,
                                    donutWidth: 30,
                                    labelDirection: 'explode',
                                    labelInterpolationFnc: function(value) {
                                        return value
                                    }
                                }],
                                ['screen and (max-width: 767px)', {
                                    labelOffset: 40,
                                    chartPadding: 20,
                                    donutWidth: 25
                                }]
                            ];
                            var pieChart<?= $row['id'] ?> = new Chartist.Pie('#ct-chart-' +<?= $row['id'] ?>, data, options, responsiveOptions);

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
                                            dur: 500,
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
                        }
                    });
                </script>
        <?php
                }
                echo '</div>';
                echo '<hr>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>
</div>