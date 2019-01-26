<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Graduates */

$this->title = 'Update Graduates: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Graduates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="graduates-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
