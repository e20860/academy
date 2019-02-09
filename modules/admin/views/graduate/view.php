<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\graduates */

$this->title = $model->fam . ' ' . $model->nam . ' ' . $model->sur;
$this->params['breadcrumbs'][] = ['label' => ' / Выпускники / ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="graduates-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Править', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данного выпускника?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'unit.name',
            'fam',
            'nam',
            'sur',
            [
               'attribute'=>'photo1',
               'value'=>('/web/img/portr/' . $model->photo1),
               'format' => ['image',['width'=>'80','height'=>'102']],
            ],
            [
               'attribute'=>'photo2',
               'value'=>('/web/img/portr/' . $model->photo2),
               'format' => ['image',['width'=>'80','height'=>'102']],
            ],
            'info:ntext',
            [
                'attribute' => 'rip',
                'value' => function($model) {
                    return $model->rip?'Ушёл из жизни':'Радуется жизни';
                },
            ],
            'local.town',
        ],
    ]) ?>

</div>
