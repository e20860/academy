<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\graduates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="graduates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'units_id')->textInput() ?>

    <?= $form->field($model, 'fam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rip')->textInput() ?>

    <?= $form->field($model, 'locals_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
