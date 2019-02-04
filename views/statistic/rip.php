<?php
$style = 'body { background: black;}';
$this->registerCSS($style);
$this->title = 'Те, кто не с нами';
?>

<div class="statistic-rip">
    <div class="row">
        <div class="col-sm-10">
            <div class="text-center">
		<h1 class="display-6 text-primary">Помним, скорбим...</h1>
            </div>
	</div>
	<div class="col-sm-2">
            <img class="img-fluid" src="/web/img/candle.jpg" alt="logo">
	</div>
    </div>
    <hr>
    <div class="row">
    <!-- Карточки -->
    <?php foreach($list as $item):?>
	<div class="col-md-3">
            <div class="card mb-3 shadow-sm img-thumbnail max-width: 100px">
                <img class="card-img-top rip" src="/web/img/portr/<?= $item['photo2']?>" alt="photo">
                <div class="card-body">
                    <h6 class="card-title"><?php echo $item['fam'] . ' ' 
                            . $item['nam'].' <br>' . $item['sur'] ?></h6>
                    <p class="card-subtitle mb-2 text-muted"><?= $item['unit'] ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <small class="text-muted">Вечная память </small>
                        </div>
                    </div>
                </div>
            </div>
	</div>
    <?php endforeach; ?>
    </div>
        
</div>