<?php

/* @var $this      yii\web\View */
/* @var $galleries array Список выводимых данных*/

use yii\helpers\Html;

$this->title = 'Подборки фотографий прошлых лет';
?>
<div class="mmedia-gals">
    <div class="row">
        <div class="col-sm-11">
            <div class="text-center">
            <h1 class="display-5 text-primary">
                <?= Html::encode($this->title)?>
            </h1>
            </div>
        </div>
        <div class="col-sm-1">
            <img class="img-fluid " src="/web/img/maa1.png" alt="logo">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <div class="jumbotron jumbotron-fluid pt-1 pb-1">
                <div class="container">
                    <p class="lead"><span class="ml-4"></span>
                        На этой странице собраны подборки фотографий, которыми поделились наши товарищи. 
                    </p>
                    
                    <div class="text-right">
                    <cite>    
                    <p>
                        Бойцы вспоминают минувшие дни </p>
                    <p> 
                        И битвы, где вместе рубились они 
                    </p>
                    <p>
                        &copy;А.С. Пушкин
                    </p>
                    </cite>
                    </div>
                    <p class="pt-2 text-success text-left">
                        Если у Вас есть чем поделиться - присылайте, мы разместим.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- заголовок таблицы -->
    <div class="row">
            <div class="col-sm-1">
                    <p class="text-center"><strong>№</strong></p>
            </div>
            <div class="col-sm-9">
                    <p class="text-center"><strong>Описание галереи</strong></p>
            </div>
            <div class="col-sm-2">
                    <p class="text-center"><strong>Действие</strong></p>
            </div>
    </div>
    <hr>
    <!-- таблица -->
    <?php foreach($galleries as $gal):?>
        <?php $nphotos = count($gal['galImgs'])?>
        <?php if($nphotos > 0):?>
        <div class="row">
                <div class="col-sm-1">
                        <p class="text-center"><?= $gal['ord']?></p>
                </div>
                <div class="col-sm-9">
                    <p class="lead"> <strong>
                        <?=$gal['name']?>
                    </strong></p>
                    <p>
                        <?=$gal['descr']?>
                    </p>
                </div>
                <div class="col-sm-2 text-center">
                        <a href="/mmedia/show?id=<?=$gal['id']?>" class="btn btn-outline-primary" role="button" aria-pressed="true">Посмотреть</a>
                </div>
        </div>
        <hr>
        <?php endif;?>
    <?php endforeach;?>
</div>