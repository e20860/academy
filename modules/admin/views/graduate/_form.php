<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Locals;
use app\models\Units;

/* @var $this yii\web\View */
/* @var $model app\models\graduates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="graduates-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'units_id')->dropDownList(
             ArrayHelper::map(Units::find()->all(),'id','name'),
            ['prompt' =>'Выберите отделение']) ?>
        </div>
        <div class="col-sm-6 font-weight-bold">
            <?= $form->field($model, 'fam')->textInput(['maxlength' => true]) ?>
        </div>    
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'nam')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'sur')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'photo1')->hiddenInput(['value' => $model->photo1]); ?>
            <?= Html::img('/web/img/portr/' . $model->photo1, ['alt' => 'Фото выпуска']) ?>
            <hr>
            <p>Сменить изображение</p>
            <input type="file" class="infile" id="photo1">
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'photo2')->hiddenInput(['value' => $model->photo2]) ?>
            <?= Html::img('/web/img/portr/' . $model->photo2, ['alt' => 'Фото современное']) ?>
            <hr>
            <p>Сменить изображение</p>
            <input type="file" class="infile" id="photo2">
        </div>    
    </div>
    <hr>
    <?= $form->field($model, 'info')->textarea(['rows' => 3]) ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'rip')->dropDownList([ '0' => 'Радуется жизни',
                                                            '1' => 'Ушёл из жизни', ]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'locals_id')->dropDownList(
                     ArrayHelper::map(Locals::find()->all(),'id','town'),
                    ['prompt' =>'Выберите населённый пункт']) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
