<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Achievs */

$this->title = 'Добавить достижение';
$this->params['breadcrumbs'][] = ['label' => ' / Достижения / ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
