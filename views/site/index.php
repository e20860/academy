<?php

/* @var $this yii\web\View */

$this->title = 'Главная страница';
$this->registerCssFile('/css/carouselle.css');
?>
<div class="site-index">

    <main role="main" class="container">
    <div class="row">
            <div class="col-sm-11">
                    <div class="text-center">
                        <h1 class="display-6 text-primary">МИХАЙЛОВСКАЯ АРТИЛЛЕРИЙСКАЯ АКАДЕМИЯ</h1>
                        <h4 class="text-primary">ALMA MATER</h4>
                    </div>
            </div>
            <div class="col-sm-1">
                <img class="img-fluid" src="/web/img/maalogo.jpg" alt="logo">
            </div>
    </div>
    <hr>    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            
          <div class="carousel-item  active">
            <img class="first-slide h-100" src= "/web/img/main.jpg" alt="N slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <p class="h1">Те, кто поступил в академию в 1991 году и выпустился в 1994-м...</p>
              </div>
            </div>
          </div>
            
          <div class="carousel-item ">
            <img class="first-slide h-100" src= "/web/img/main.jpg" alt="N slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <p class="h1">в 2019-м находясь геграфически в разных местах...</p>
              </div>
            </div>
          </div>
            
          <div class="carousel-item ">
            <img class="first-slide h-100" src= "/web/img/main.jpg" alt="N slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <p class="h1">... совместно отмечают 25-летие выпуска!!!</p>
              </div>
            </div>
          </div>
            
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Назад</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Вперёд</span>
        </a>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
		  <div class="col-md-2">
			<img class="img-fluid" src="/web/img/cat1994.jpg" alt="catimg">
		  </div>
          <div class="col-md-4">
            <h2>1994</h2>
            <p>Обогащённые знаниями, полученными за три трудных года обучения, со светлыми 
            одухотворёнными лицами, собрав в охапку семьи и нехитрый домашний скарб, разъезжались они 
            по городам и весям в соответствии с полученными назначениями сеять разумное, доброе, вечное...</p>
          </div>
		  <div class="col-md-2"> 	
			<img class="img-fluid" src="/web/img/cat2019.jpg" alt="catimg">
		  </div>
          <div class="col-md-4">
            <h2>2019</h2>
            <p>... пожав урожай своих посевов, окрепшие духовно, познавшие радость побед 
                и горечь поражений, с изменившимся внешним видом, но по прежнему горящими 
                глазами, собирались они вспомнить молодость, поделиться жизненной энергией
            , набраться сил для дальнейших свершений.</p>
          </div>
        </div>

        <hr>

      </div> <!-- /container -->
    </main>
</div>
