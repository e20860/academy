<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\UnitsRecord */

$this->title = 'Update Units Record: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Units Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="units-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
