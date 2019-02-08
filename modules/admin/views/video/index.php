<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Видео';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить ролик', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'ord',
            'name',
            'descr:ntext',
            'link',
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
