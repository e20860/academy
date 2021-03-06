<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\UnitsRecord */

$this->title = 'Create Units Record';
$this->params['breadcrumbs'][] = ['label' => 'Units Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="units-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
