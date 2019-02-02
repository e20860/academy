<?php

/* @var $this yii\web\View */

$this->title = 'Наши достижения';
?>
<div class="statistic-achievs">
    <main role="main" class="container">
        <div class="row">
                <div class="col-sm-11">
                        <div class="text-center">
                        <h1 class="display-6 text-primary">Достижения выпускников - гордость курса</h1>
                        </div>
                </div>
                <div class="col-sm-1">
                    <img class="img-fluid" src="/web/img/maa1.png" alt="logo">
                </div>
        </div>
        <hr>
        <?php foreach($list as $title => $grads):?>
        <div class="row">
            <div class="col-sm-12">
                <p class="h2 text-center text-danger"><?= $title?></p>
            </div>
	</div>
	<hr>
        <div class="row">
            <!-- Массив карточек по циклу -->
            <?php foreach ($grads as $grad):?>
            <?php $person = $grad['graduates']; 
                $pimg = $person['photo2'];
                $pname = $person['fam'] . ' ' .$person['nam'] .' ' .$person['sur'];
                $info = $person['info'];
            ?>
            <div class="col-md-3">
                <div class="card mb-3 shadow-sm img-thumbnail max-width: 100px">
                    <img class="card-img-top" src="/web/img/portr/<?= $pimg ?>" alt="photo">
                    <div class="card-body">
                        <h5 class="card-title"><?= $pname ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?=$grad['descr']?></h6>
                        <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <small class="text-muted"><?= $info ?></small>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <hr>
        <?php endforeach; ?>
    </main>
</div>