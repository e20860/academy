<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Тестовая';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-menu">
    <h1>Массив меню</h1>
    <hr>
        
    <pre>
        <?php
        print_r($model);
        ?>
    </pre>
    
</div>