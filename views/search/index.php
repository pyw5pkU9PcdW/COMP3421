<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = $input;
?>
<div class="activity-index container">
    <h1>Search for "<?= $input ?>"</h1>
    <h3><?= count($result) ?> results in total</h3>
    <?php foreach($result as $row) { ?>
        <a href="?r=<?= $row['type'] ?>/view&id=<?= $row['id'] ?>" class="">
            <table class="table">
                <tr>
                    <td><h3><?= $row['title'] ?></h3></td>
                </tr>
                <tr>
                    <td><?= $row['detail'] ?></td>
                </tr>
            </table>
        </a>
    <?php } ?>
</div>