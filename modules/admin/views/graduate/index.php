<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Units;
use app\models\Locals;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\GraduatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Выпускники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graduates-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить выпускника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'units_id',
                'value' => 'unit.name',
                'filter' => ArrayHelper::map(Units::find()->all(), 'id', 'name'),
            ],
            'fam',
            'nam',
            'sur',
            //'photo1',
            //'photo2',
            //'info:ntext',
            //'rip',
            [
                'attribute' => 'locals_id',
                'value' => 'local.town',
                'filter' => ArrayHelper::map(Locals::find()->all(), 'id', 'town'),
            ],
            

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="btn btn-primary btn-sm">o</span>', $url, [
                            'title' => 'Посмотреть',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="btn btn-secondary btn-sm">/</span>', $url, [
                            'title' => 'Изменить',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="btn btn-danger btn-sm">x</span>', $url, [
                            'title' => 'Удалить',
                            'data' => [
                                'method' => 'post',
                                'confirm' =>'Вы уверены, что хотите удалить?',
                            ]
                        ]);
                    },
                ],                
            ],

        ],
    ]); ?>
</div>
