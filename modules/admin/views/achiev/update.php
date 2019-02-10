<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Achievs */

$this->title = 'Правка достижения: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => ' / Достижения /', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ' / Правка';
?>
<div class="achievs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
