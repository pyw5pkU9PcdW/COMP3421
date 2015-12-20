<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserBibi */

$this->title = 'Update User Biography: ' . ' ' . \app\models\User::getUserFullNameById($model->User_id);
$this->params['breadcrumbs'][] = ['label' => 'User Biography', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => \app\models\User::getUserFullNameById($model->User_id), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-bibi-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
