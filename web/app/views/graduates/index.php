<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GraduatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Graduates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graduates-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Graduates', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'units_id',
            'fam',
            'nam',
            'sur',
            //'photo1',
            //'photo2',
            //'info:ntext',
            //'rip',
            //'locals_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
