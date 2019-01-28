<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $person array */
/* @var $contacts array*/
/* @var $local array */
/* @var $cnt_types array*/

$picPath = Yii::$app->basePath .'/web/img/portr/';
$photo1 = $picPath . $person['photo1'];
if(file_exists($photo1)) {
    $photo1 = '/web/img/portr/' . $person['photo1'];
} else {
    $photo1 = '/web/img/portr/1994.jpg';
}

$photo2 = $picPath . $person['photo2'];
if(file_exists($photo2)) {
    $photo2 = '/web/img/portr/' . $person['photo2'];
} else {
    $photo2 = '/web/img/portr/2019.jpg';
}

?>
    <div class="row">
            <div class="col-sm-3">
                    <!-- карточка БЫЛО -->
                      <div class="card mb-3 shadow-sm img-thumbnail max-width: 100px">
                            <img class="card-img-top" id="mod_old" 
                                 src="<?= $photo1 ?>" alt="<?= $person['photo1']?>">
                            <div class="card-body">
                              <h6 class="card-subtitle mb-2 text-muted">При выпуске</h6>
                            </div>
                      </div>
            </div>
            <div class="col-sm-6">
                    <!-- информация о слушателе -->
                    <p class="h3 text-center text-primary">
                        <?php echo $person['fam'] . ' ' . $person['nam'] . ' ' . $person['sur']; ?>
                    </p>
                    <div class="row">
                            <div class="col-sm-6 text-left">
                                    Регион проживания
                            </div>					
                            <div class="col-sm-6 text-right">
                               <?php echo $local['country'] .', ' . $local['town']; ?>     
                            </div>					
                    </div>
                    <hr>
                    <?php foreach ($contacts as $contact): ?>
                    <div class="row">
                            <div class="col-sm-6 text-left">
                                <?= $cnt_types[$contact['type']]?>
                            </div>					
                            <div class="col-sm-6 text-right">
                                    <?= $contact['cont_info']?>
                            </div>					
                    </div>
                    <?php endforeach; ?>
                    <hr>
                    <div class="row">
                    <hr>
                    <br>
                    <p class="text-left">
                        <?= $person['info'] ?>
                    </p>    
                    </div>
                    <br>
                    <hr>
            </div>
            <div class="col-sm-3">
                    <!-- карточка СТАЛО -->
                    <div class="card mb-3 shadow-sm img-thumbnail max-width: 100px">
                        <img class="card-img-top" id="mod_new" 
                             src="<?= $photo2 ?>" alt="<?= $person['photo2']?>">
                            <div class="card-body">
                               <h6 class="card-subtitle mb-2 text-muted">Современное фото</h6>
                        </div>
                </div>

            </div>
    </div>
              
              
