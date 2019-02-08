<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locals */

$this->title = 'Добавление населённого пункта';
$this->params['breadcrumbs'][] = ['label' => '/ Населённые пункты / ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
