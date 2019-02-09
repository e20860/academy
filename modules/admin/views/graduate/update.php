<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\graduates */

$this->title = 'Правка данных: ' . $model->fam . ' ' . $model->nam . ' ' . $model->sur;
$this->params['breadcrumbs'][] = ['label' => ' / Выпускники / ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fam , 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ' /  Правка';
?>
<div class="graduates-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
