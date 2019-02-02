<?php

/* @var $this yii\web\View */
/* @var $tlist array Массив данных о преподавателях*/
$this->title = 'Преподаватели';

?>
<div class="management-profteach">
    <main role="main" class="container">
		<div class="row">
			<div class="col-sm-11">
				<div class="text-center">
				<h1 class="display-5 text-primary">Профессорско-преподавательский состав (1991-1994)</h1>
				</div>
			</div>
			<div class="col-sm-1">
                            <img class="img-fluid" src="/web/img/maalogo.jpg" alt="logo">
			</div>
		</div>
		<hr>
		<div class="row">
		<!-- Карточки -->
                <?php foreach($tlist as $person): ?>
		<div class="col-md-3">
                    <div class="card mb-3 shadow-sm img-thumbnail max-width: 100px">
                        <img class="card-img-top" src="/web/img/prep/<?= $person['img'] ?>" alt="photo">
                      <div class="card-body">
                                        <h5 class="card-title"><?= $person['name'] ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?= $person['subject'] ?></h6>
                          <div class="d-flex justify-content-between align-items-center">
                        </div>
                      </div>
                    </div>
		</div>
                <?php endforeach;?>
                <hr>
		</div>
      </main>    
</div>