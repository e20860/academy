<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Galleries */

$this->title = 'Create Galleries';
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galleries-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
