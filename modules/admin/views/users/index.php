<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Graduates;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи сайта';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Добавить нового', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' =>'graduates_id',
                //'value' =>  'graduates.fam',
                'format' => 'text',
                'content' =>function($data){
                    return $data->getGradName();
                },
                'filter' => Graduates::find()->select('fam')->column(),
                
            ],
            'username',
            //'password',
            //'authkey',
            //'accesstoken',

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
