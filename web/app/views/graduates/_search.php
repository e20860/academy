<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GraduatesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="graduates-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'units_id') ?>

    <?= $form->field($model, 'fam') ?>

    <?= $form->field($model, 'nam') ?>

    <?= $form->field($model, 'sur') ?>

    <?php // echo $form->field($model, 'photo1') ?>

    <?php // echo $form->field($model, 'photo2') ?>

    <?php // echo $form->field($model, 'info') ?>

    <?php // echo $form->field($model, 'rip') ?>

    <?php // echo $form->field($model, 'locals_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
