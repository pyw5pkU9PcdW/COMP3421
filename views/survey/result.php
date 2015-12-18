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
?>
<!-- Site content goes here !-->

<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

<div class="survey-result">
    <div class="container">
        <?php
            foreach ($dataProvider as $row) {
                echo '<div class="panel-group">';
                echo '<div class="panel panel-default">';
                echo '<a data-toggle="collapse" href="#collapse'.$row['id'].'">';
                echo '<div class="panel-heading">';
                echo $row['question'];
                echo '</div>';
                echo '<div id="collapse'.$row['id'].'" class="panel-collapse collapse">';
                echo '<div class="panel-body">';
                if($row['type'] == 0) {
                    echo '<table class="table">';
                    for($i = 0; $i < count($row['results']); $i++) {
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$row['results'][$i].'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
                if($row['type'] == 1) {
                    echo '<div id="ct-chart-'.$row['id'].'" class="ct-chart ct-perfect-fourth"></div>';
                }
                if($row['type'] == 2) {
                    echo '<div id="ct-chart-'.$row['id'].'" class="ct-chart ct-perfect-fourth"></div>';
                }
                echo '</div>';
                echo '<hr>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</div>
<div id="ct-chart-demo" class="ct-chart ct-perfect-fourth"></div>
<script>
    var chart = new Chartist.Line('#ct-chart-demo', {
        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
        series: [
            [5, 5, 10, 8, 7, 5, 4, null, null, null, 10, 10, 7, 8, 6, 9],
            [10, 15, null, 12, null, 10, 12, 15, null, null, 12, null, 14, null, null, null],
            [null, null, null, null, 3, 4, 1, 3, 4,  6,  7,  9, 5, null, null, null]
        ]
    }, {
        fullWidth: true,
        chartPadding: {
            right: 10
        },
        lineSmooth: Chartist.Interpolation.cardinal({
            fillHoles: true,
        }),
        low: 0
    });
</script>