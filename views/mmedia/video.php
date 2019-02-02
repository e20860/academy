<?php

/* @var $this      yii\web\View */
/* @var $galleries array Список выводимых данных*/

use yii\helpers\Html;

$this->title = 'Подборка видеоматериалов';

?>
<div class="mmedia-video">
    <main role="main" class="container">
        <div class="row">
            <div class="col-sm-11">
		<div class="text-center">
                    <h1 class="display-5 text-primary">
                        <?= Html::encode($this->title) ?>
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
                            Выкладываем имеющиеся видеоматериалы 
                        </p>
			<p class="pt-2 text-success">
                            Если у Вас есть чем поделиться - размещайте ролики 
                            на видеохостингах, присылайте ссылки, мы разместим.
                        </p>
		     </div>
		</div>
            </div>
	</div>
	<hr>
		<!-- таблица -->
        <?php foreach ($videos as $video): ?>
		<div class="row">
			<div class="col-sm-3">
				<h3 class="text-center text-primary"><?= $video['name']?></h3>
				<p><?=$video['descr']?></p>
			</div>
			<div class="col-sm-9">
                            <?= $video['link']?>
			</div>
		</div>
		<hr>
        <?php endforeach;?>
    </main>
   
</div>
