<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locals */

$this->title = 'Create Locals';
$this->params['breadcrumbs'][] = ['label' => 'Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
