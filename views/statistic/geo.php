<?php

/* 
 * HMDoll project framework of internet-shop
 * No License (OPEN GNU)
 * Author E.Slavko <e20860@mail.ru>
 */

$style = '.map {width: 100%; height: 400px;}';
$this->registerCss($style);
?>
<div class="statistic-geo">
    <main role="main" class="container">
		<div class="row">
			<div class="col-sm-11">
				<div class="text-center">
				<h1 class="display-5 text-primary">Распределение оседания слушателей на 2019 г</h1>
				<p class="lead text-primary">Ох и разбросало нас с тобой, Василий Иванович ...&copy;</p>
				</div>
			</div>
			<div class="col-sm-1">
                            <img class="img-fluid" src="/web/img/maa1.png" alt="logo">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-10">
				<div id="map" class="map"> </div>
			</div>
			<div class="col-sm-2">
				<p class="text-info">Легенда</p>
				<hr>
				<p class="text-secondary">На странице показано географическое распределение слушателей через 25 лет после выпуска</p>
				<p class="text-secondary"><small>Каждая геоточка опирается на населённый пункт. Внутри - количество проживающих, при наведении мыши - список</small></p>
			</div>
		</div>


    </main>
</div>
<?php


$jsfile = "https://api-maps.yandex.ru/2.1/?apikey=01b21e05-8395-4730-8a50-2e90eac87f2f&lang=ru_RU";
$this->registerJsFile($jsfile);

$jss = <<< JSS
		// Сначала получаем статистические данные из файла
		var stats = [];
		$.ajax({
			dataType: "json",
			url: "/web/temp/statistic.txt",
			mimeType: "application/json",
			success: function(data){
				stats = data;
			}
		});
		// Функция ymaps.ready() будет вызвана, когда
		// загрузятся все компоненты API, а также когда будет готово DOM-дерево.
		ymaps.ready(init);
		function init(){ 
			// Создание карты.    
			var myMap = new ymaps.Map("map", {
				// Координаты центра карты.
				// Порядок по умолчанию: «широта, долгота».
				// Чтобы не определять координаты центра карты вручную,
				// воспользуйтесь инструментом Определение координат.
				center: [55.2, 62.5],
				// Уровень масштабирования. Допустимые значения:
				// от 0 (весь мир) до 19.
				zoom: 4
			});
			// ГеоОбъекты
			/*
			var novosib = new ymaps.GeoObject({
				// Описание геометрии.
				geometry: {
					type: "Point",
					coordinates: [55.11618, 82.93932]
				},
				// Свойства.
				properties: {
					// Контент метки.
					iconContent: '2',
					hintContent: 'Славко, Хмелик'
				}
			}, {
				// Опции.
				// Иконка метки будет растягиваться под размер ее содержимого.
				preset: 'islands#blackStretchyIcon',
				// Метку можно перемещать.
				draggable: true
			});
			*/
			//--------------------------------------------------------------------
			if(stats.length == 0){
			    stats = [
						{town: 'Москва',crd: [55.76,37.61], quant: '25', hint: 'Список выпускников'},
						{town: 'Cанкт-Петербург',crd: [59.94,30.32], quant: '21', hint: 'Список выпускников'},
						{town: 'Тверь',crd: [56.86,35.92], quant: '4', hint: 'Список выпускников'},
						{town: 'Екатеринбург',crd: [56.84,60.60], quant: '7', hint: 'Список выпускников'},
						{town: 'Новосибирск',crd: [55.06,82.92], quant: '2', hint: 'Список выпускников'}
						];
			};
			var objs =[];
			for(var i = 0; i < stats.length; i++){
				objs[i] = new ymaps.GeoObject({geometry: {type: 'Point', coordinates: stats[i].crd}, properties: { iconContent: stats[i].quant, hintContent: stats[i].hint}},{preset: 'islands#blackStretchyIcon'});
				myMap.geoObjects.add(objs[i]);
			};
			//--------------------------------------------------------------------
			//myMap.geoObjects.add(novosib);
		} // init

JSS;
$this->registerJs($jss);