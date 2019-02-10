<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AchievSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Achievs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Achievs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'graduates_id',
            'type',
            'descr',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
