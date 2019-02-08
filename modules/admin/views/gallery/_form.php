<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Galleries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="galleries-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'units_id')->textInput() ?>

    <?= $form->field($model, 'ord')->textInput() ?>
    
    <?= $form->field($model, 'descr')->textarea(['rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
