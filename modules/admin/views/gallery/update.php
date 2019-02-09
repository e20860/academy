<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Galleries */

$this->title = 'Правка: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => ' / Галереи / ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="galleries-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <hr>
    <p class="h1 text-center">Фотографии, входящие в галерею</p>
    <hr>
    <div class="row">
        <div class="col-sm-6 text-right">
            Загрузить новое фото в галерею
        </div>
        <div class="col-sm-6">
            <form>
                <div class="form-group">
                  <input id="idmodel" type="hidden" name="idmodel"  value="<?=$model->id;?>">  
                  <input type="file" class="form-control-file" id="imgFile">
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-8">
        <?php 
         Pjax::begin();
            echo GridView::widget([
                'dataProvider' => $images,
                'columns' => [
                  'id',
                  'img',
                   [
                      'attribute' => 'img',
                      'label' => 'Картинка',
                      'format' => 'html',
                      'value' => function($model, $key, $index, $column) {
                        return Html::img('/web/img/gal/' . $model->img,[
                            'width' => '50px', 'style' => 'max-width:100%'
                            ]);
                      }
                   ],
                   [
                       'attribute' => 'id',
                       'label' => 'Действие',
                       'format' => 'html',
                       'value' => function($model, $key, $index, $column) {
                            return Html::a('x', '/admin/gallery/delpic?id='
                                    .$model->id . '&gal='.$model->gallery, 
                                    [
                                        'class' => 'btn btn-danger btn-sm',
                                    ]);
                       }
                   ]
                           
                ],
            ]);
            Pjax::end();
        ?>
        </div>
        <div class="col-sm-4">
            
        </div>

    </div>


</div>
<?php
$script = "
    $('#imgFile').on('change',function(e){
        var idmodel = $('#idmodel').val();
        var file_data = $('#imgFile').prop('files')[0];
        var formData = new FormData();
        formData.append('imgFile', file_data);
        formData.append('idmodel', idmodel);
        $.ajax({
            type: 'post',
            url:'/admin/gallery/uploadpic',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                 console.log(data);
            },
            error: function(e){
                console.log(e);
            }
        })  
        e.preventDefault();
         
        return false;
    });     
";
$this->registerJs($script);

?>