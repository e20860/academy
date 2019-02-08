<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\LocalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locals-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Locals', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'country',
            'town',
            'crd',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
