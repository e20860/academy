<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О сайте';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="row">
        <div class="col-sm-11">
            <div class="text-center">
                <h1 class="text-primary"><?= Html::encode($this->title) ?></h1>
            </div>
        </div>
        <div class="col-sm-1">
            <img class="img-fluid " src="/web/img/maa1.png" alt="logo">
        </div>
    </div>
    <hr>
    <div class="row mt-1 pt-0">
        <div class="jumbotron jumbotron-fluid mt-2 mb-1 pt-2 pb-1">
          <div class="container">
            <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-9">
                        <h2 class="display-6 text-left">Цель и задачи</h2>
                    </div>
            </div>
            <p class="lead text-left ml-3 mr-3">
                &nbsp;&nbsp;&nbsp;&nbsp;Сайт создан для информационного сопровождения встречи выпускников 
                Военной Артиллерийской академии 1994 года, посвящённой 25-летию выпуска 
                командного факультета, назначенной на 01.06.2019 г., 
                
            </p>
          </div>
        </div>		
    </div>
		<div class="row">
			
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-3">
				
			</div>
			<div class="col-sm-9">
				<p class="h2 text-left text-secondary">Организационное ядро (администрация) сайта</p>
			</div>
		</div>
		<hr>
		<!-- разделитель карточек -->
		<div class="row">
			<div class="col-sm-2">
                            <img class="img-fluid rounded-circle" src="/web/img/about/savenko.jpg" alt="savenko">
			</div>
			<div class="col-sm-1">
			</div>
			<div class="col-sm-9">
				<p class="h4 text-info">Савенко Сергей Александрович</p>
				<p class="lead">Функции в проекте</p>
				<ul>
					<li>Инициатива создания </li>
					<li>Сбор и обработка информации</li>
					<li>Координация деятельности, связи с общественностью</li>
					<li>Контент-менеджмент</li>
				</ul>
			</div>
		</div>
		<hr>
		<!-- разделитель карточек -->
		<div class="row">
			<div class="col-sm-2">
                            <img class="img-fluid rounded-circle" src="/web/img/about/slavko.jpg" alt="slavko">
			</div>
			<div class="col-sm-1">
			</div>
			<div class="col-sm-9">
				<p class="h4 text-info">Славко Евгений Юрьевич</p>
				<p class="lead">Функции в проекте</p>
				<ul>
					<li>Архитектура проекта</li>
					<li>Разработка</li>
					<li>Техническая поддержка</li>
					<li>Сопровождение</li>
				</ul>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-3">
				
			</div>
			<div class="col-sm-9">
				<p class="h2 text-left text-secondary">Обратная связь</p>
			</div>
		</div>
		<hr>
			<p class="lead">Если у Вас есть вопросы или предложения по оформлению сайта или Вы нашли какую-либо неточность, которую необходимо исправить, пожалуйста, заполните форму. </p>
		<hr>
		<form>
		  <div class="form-group row">
			<label for="inputEmail" class="col-sm-2 col-form-label">Ваш email</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" id="inputEmail3" placeholder="Email"  required="required">
			</div>
		  </div>
		  <div class="form-group row">
			<label for="inputText" class="col-sm-2 col-form-label">Содержание</label>
			<div class="col-sm-10">
			  <textarea class="form-control" id="inputText" rows="3">
			  </textarea>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-12 text-right">
				<button type="submit" class="btn btn-primary">Отправить</button>
			</div>	
		  </div>
		</form>

</div>
