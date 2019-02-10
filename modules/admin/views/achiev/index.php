<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use app\models\Graduates;
use app\models\AcvTypes;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AchievSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '  Достижения выпускников';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить достижение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'graduates_id',
                'value' => 'graduates.fam',
                'filter' => ArrayHelper::map(Graduates::find()->all(),'id','fam'),
            ],
            [
                'attribute' => 'type',
                'value' => 'type0.name',
                'filter' => ArrayHelper::map(AcvTypes::find()->all(),'id','name'),
            ],
            'descr',

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
