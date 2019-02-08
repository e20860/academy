<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locals */

$this->title = 'Корректировка данных: ' . $model->town;
$this->params['breadcrumbs'][] = ['label' => '/ Населённые пункты/ ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->town, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '/ Корректировка';
?>
<div class="locals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
