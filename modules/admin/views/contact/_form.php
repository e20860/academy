<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\CntTypes;
use app\models\Graduates;

/* @var $this yii\web\View */
/* @var $model app\models\Contacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(
            CntTypes::find()->all(),'id','name'),
            ['prompt' => 'Выерите тип контакта'] 
            )?>

    <?= $form->field($model, 'graduates_id')->dropDownList(ArrayHelper::map( 
            Graduates::find()->all(),'id','fam'),
            ['prompt' => 'Выберите выпускника']
            )?>

    <?= $form->field($model, 'cont_info')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
