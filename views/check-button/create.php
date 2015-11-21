<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CheckButton */

$this->title = 'Create Check Button';
$this->params['breadcrumbs'][] = ['label' => 'Check Buttons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-button-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
