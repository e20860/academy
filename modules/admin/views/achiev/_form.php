<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\AcvTypes;
use app\models\Graduates;

/* @var $this yii\web\View */
/* @var $model app\models\Achievs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="achievs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'graduates_id')->dropDownList(ArrayHelper::map( 
            Graduates::find()->all(),'id','fam'),
            ['prompt' => 'Выберите выпускника']
    )?>

    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(
            AcvTypes::find()->all(),'id','name'),
            ['prompt' => 'Выерите тип достижения'] 
            )?>

    <?= $form->field($model, 'descr')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
