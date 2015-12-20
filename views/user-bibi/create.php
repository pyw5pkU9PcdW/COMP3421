<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserBibi */

$this->title = 'Create User Biography';
$this->params['breadcrumbs'][] = ['label' => 'User Bibis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-bibi-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
