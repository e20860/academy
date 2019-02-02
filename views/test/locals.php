<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Работаем с GridView';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-menu">
    <h1>Города</h1>
    <hr>
        
<?php
    echo \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' =>[
            'id',
            'country',
            'town',
            'crd',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'template' => '{update} {delete}',
                'buttons' => [
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
                                
                            ],
                        ]);
                    }
                ],
            ],            
        ],
    ]);
?>
</div>