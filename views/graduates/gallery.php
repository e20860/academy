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
?>
<main role="main" class="container">
    <div class="row">
            <div class="col-sm-10">
                    <div class="text-center">
                    <h1 class="display-6 text-primary">Галерея изображений отделения</h1>
                    </div>
                    <hr>
            </div>
            <div class="col-sm-2">
                <img class="img-fluid" src=" /web/img/maa1.png " alt="emblema"style="height: 60px">
            </div>
    </div>
    <div class="gallery">
        <?php foreach($photos as $photo): ?>
        <a href="/web/img/gal/<?= $photo['img']?>" class="fancybox" rel="gallery" title="">
            <img src="/web/img/gal/<?= $photo['img']?>" style="height: 150px"></a>
        <?php endforeach;?>
    </div>
</main>
<?php
//    $fbscript = "/web/js/fancybox/jquery.fancybox.pack.js";
//    $this->registerJsFile($fbscript, [
//       ['depends' => [\yii\web\JqueryAsset::className()]],
//       ]);
?>
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
<hr>