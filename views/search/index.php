<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = $input;
?>
<link href="css/search.css" rel="stylesheet">
<div class="search-index container">
    <h1>Search for "<?= $input ?>"</h1>
    <h3><?= count($result) ?> results in total</h3>
    <?php foreach($result as $row) { ?>
        <a href="?r=<?= $row['type'] ?>/view&id=<?= $row['id'] ?>" class="">
            <table class="table">
                <tr>
                    <td><h3><?= $row['title'] ?></h3></td>
                </tr>
                <tr>
                    <td><div class="detail"><?= $row['detail'] ?></div></td>
                </tr>
            </table>
        </a>
    <?php } ?>
</div>