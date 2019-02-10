<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contacts */

$this->title = 'Правка контакта: ' . $model->cont_info;
$this->params['breadcrumbs'][] = ['label' => ' / Контакты / ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cont_info, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ' / Править';
?>
<div class="contacts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
