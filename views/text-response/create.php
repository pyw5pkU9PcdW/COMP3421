<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TextResponse */

$this->title = 'Create Text Response';
$this->params['breadcrumbs'][] = ['label' => 'Text Responses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-response-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
