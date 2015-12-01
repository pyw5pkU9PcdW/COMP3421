<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TextBox */

$this->title = 'Create Text Box';
$this->params['breadcrumbs'][] = ['label' => 'Text Boxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-box-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
