<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\graduates */

$this->title = 'Новый выпускник';
$this->params['breadcrumbs'][] = ['label' => ' / Выпускники / ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graduates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
