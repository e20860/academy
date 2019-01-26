<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GraduatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $unit['name'];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graduates-index">

    <h1 class="text-primary text-center"><?= Html::encode($this->title) ?></h1>
    <hr>
    <main role="main" class="container">
	<div class="row">
	<!-- Карточка командира отделения -->
	<div class="col-md-3">
        <div class="card mb-3 shadow-sm img-thumbnail max-width: 100px">
            <img class="card-img-top" src="/web/img/portr/<?=$commander['photo1'] ?>" alt="commander">
            <div class="card-body">
            <h5 class="card-title"><?php echo $commander['fam'] . '  '
                    . mb_substr($commander['nam'],0,1) . '. '
                    . mb_substr($commander['sur'],0,1) . '. ';
                    ?></h5>
	        <h6 class="card-subtitle mb-2 text-muted">Командир отделения</h6>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary showModal" data-old-img="img/portr/14_13.jpg" data-new-img="img/portr/ЦЫГАНОВ.jpg">Подробнее</button>
                </div>
                </div>
                </div>
        </div>
	</div>
        <div class="col-md-7">
            <!-- Информация общая об отделении -->
            <div class="text-center">
            <h3 class="text-primary">Общая информация</h3>
            </div>
            <hr>
            <p class="lead"> <?= $unit['descr']?></p>
            <hr>
            <div class="text-right">
               <a href="#" class="btn btn-outline-primary" role="button" aria-pressed="true">
                   Посмотреть фотографии отделения</a>
            </div>
        </div>
        <div class="col-md-2">
            <img class="img-fluid" src="/web/img/sign.png" alt="emblema">
        </div>
        </div>
        <hr>
	<div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Карточки слушателей -->
                <?php foreach ($unitList as $person): ?>
                <?php if($person['id'] != $commander['id']):?>
                <div class="col-md-3">
                  <div class="card mb-3 shadow-sm img-thumbnail max-width: 100px">
                      <img class="card-img-top" src="/web/img/portr/<?= $person['photo1']?>" alt="student">
                    <div class="card-body">
                                      <h5 class="card-title"><?php 
                                        echo $person['fam'] . '  '
                                        . mb_substr($person['nam'],0,1) . '. '
                                        . mb_substr($person['sur'],0,1) . '. ';
                                      ?></h5>
                      <p class="card-text"><?php 
                            echo 'Проживает в г. ' . $person['local']; 
                           ?></p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary showModal" data-old-img="img/portr/14_01.jpg" data-new-img="img/portr/АРТЕМОВ.jpg">Подробнее</button>                    </div>
                        <small class="text-muted">Тили - тили</small>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php endforeach;?>
            </div>
        </div>
        </div>
<!-- ---------------------------------------- -->
</main>                   
    
    

</div>