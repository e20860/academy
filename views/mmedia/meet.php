<?php

use yii\helpers\Html;

$fbcss = "/web/js/fancybox/jquery.fancybox.css";
$style  = '	   .gallery img{
		 margin:5px; /* внешние отступы картинок */
		 border:3px solid #fff; /* рамка картинок */
	   }
	   a.fancybox:hover img{
		 border:3px solid #034F80; /* изменение цвета рамки при наведении на картинку */
	   }';

$this->registerCss($style);
$this->title = $gallery['name'];
?>
<div class="mmedia-meet">
<main role="main" class="container">
    <!-- Шапка галереи -->
    <div class="row">
            <div class="col-sm-10">
                    <div class="text-center">
                    <h1 class="display-6 text-primary">
                        <?= Html::encode($this->title)?>
                    </h1>
                    </div>
                    <hr>
            </div>
            <div class="col-sm-2">
                <img class="img-fluid" src=" /web/img/maa1.png " alt="emblema"style="height: 60px">
            </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-12">
            <div class="jumbotron jumbotron-fluid pt-1 pb-1">
              <div class="container">
                    <p class="lead"><span class="ml-4"></span>Здесь будут размещены фотографии встречи, которая должна состояться (как нам думается). </p>

                    <p class="pt-2">Кроме того, фотографии будут размещены архивом на доступном ресурсе для скачивания. <span class="ml-2"><a href="#">Скачать...</a></span></p>
              </div>
            </div>
      </div>
    </div>
    <hr>
    <!--Картинки -->
    <div class="gallery">
        <?php foreach($photos as $photo): ?>
        <a href="/web/img/gal/<?= $photo['img']?>" class="fancybox" rel="gallery" title="">
            <img src="/web/img/gal/<?= $photo['img']?>" style="height: 150px"></a>
        <?php endforeach;?>
        <hr>        
    </div>
</main>
</div>    
<!-- Скрипты и прочия...-->
<?php
    $js = "
      $(document).ready(function(){
         $('a.fancybox').fancybox({
         transitionIn: 'elastic',
         transitionOut: 'elastic',
         speedIn: 500,
         speedOut: 500,
         hideOnOverlayClick: false,
         titlePosition: 'over'
         });
      });      
    ";            
    $this->registerJs($js);
?>
