<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Units */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="units-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ord')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>

    <?php  
        $graduates = \app\models\Graduates::find()->select([ 'id','fam'])
            ->asArray()
            ->all();
        $items =  ArrayHelper::map($graduates,'id','fam');
        echo $form->field($model, 'commander')->dropdownList($items ,
        ['prompt'=>'Выберите командира'] ); 
    ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
