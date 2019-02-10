<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\graduates */

$this->title = 'Правка данных: ' . $model->fam . ' ' . $model->nam . ' ' . $model->sur;
$this->params['breadcrumbs'][] = ['label' => ' / Выпускники / ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fam , 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ' /  Правка';
?>
<div class="graduates-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php
$script = "
    $('.infile').on('change',function(e){
        var img = $(this).attr('id');
        var file_data = $(this).prop('files')[0];
        var formData = new FormData();
        formData.append('imgFile', file_data);
        $.ajax({
            type: 'post',
            url:'/admin/graduate/uploadpic',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(fname) {
                //console.log(fname);
                if (img == 'photo1') {
                   $('#graduates-photo1').val(fname);
                   $('.col-sm-6 img:first').attr('src','/web/img/portr/'+fname);
                }
                if (img == 'photo2') {
                   $('#graduates-photo2').val(fname);
                   $('.col-sm-6 img:last').attr('src','/web/img/portr/'+fname);
                }
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