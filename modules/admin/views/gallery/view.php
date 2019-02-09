<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Galleries */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '/ Галереи / ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="galleries-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Править', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить галерею?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'units_id',
            'ord',
            'descr:ntext',
        ],
    ]) ?>
    <hr>
    <p class="h1 text-center">Фотографии, входящие в галерею</p>
    <hr>
    <div class="row">
        <div class="col-sm-8">
        <?php 
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
                           
                ],
            ]);
        ?>
        </div>
        <div class="col-sm-4">
            
        </div>

    </div>
    

</div>
