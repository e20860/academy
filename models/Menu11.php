<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
/**
 * Меню прогаммы
 *
 * @author admin
 */
class Menu11 extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'menu';
    }
    
    public static function getMenuArray()
    {
        return [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Руководство', 'items' => [
                ['label' => 'Академии', 'url' => ['/management/top'], 'class'=>"dropdown-item"],
                ['label' => 'Факультета', 'url' => ['/management/faculty']],
                '<div class="dropdown-divider"></div>',
                ['label' => 'Преподаватели', 'url' => ['/management/profteach']],
            ],
            ],                
            ['label' => 'Отделения', 'items' => [
                ['label' => '10 учебное отделение', 'url' => ['/graduates/index?id=1']],
                ['label' => '11 учебное отделение', 'url' => ['/graduates/index?id=2']],
                ['label' => '12 учебное отделение', 'url' => ['/graduates/index?id=3']],
                ['label' => '13 учебное отделение', 'url' => ['/graduates/index?id=4']],
                ['label' => '14 учебное отделение', 'url' => ['/graduates/index?id=5']],
                '<div class="dropdown-divider"></div>',
                ['label' => '15 учебное отделение', 'url' => ['/graduates/index?id=6']],
                ['label' => '16 учебное отделение', 'url' => ['/graduates/index?id=7']],
                ['label' => '17 учебное отделение', 'url' => ['/graduates/index?id=8']],
                ['label' => '18 учебное отделение', 'url' => ['/graduates/index?id=9']],
                ['label' => '19 учебное отделение', 'url' => ['/graduates/index?id=10']],
                '<div class="dropdown-divider"></div>',
                ['label' => '20 учебное отделение', 'url' => ['/graduates/index?id=11']],
            ],    
            ],    
            ['label' => 'Статистика', 'items' => [
                ['label' => 'Достижения', 'url' => ['/statistic/achievs']],
                ['label' => 'География', 'url' => ['/statistic/geo']],
                '<div class="dropdown-divider"></div>',
                ['label' => 'Ушедшие', 'url' => ['/statistic/rip']],
            ],
            ],                
            ['label' => 'Мультимедиа', 'items' => [
                ['label' => 'Разные фото', 'url' => ['/mmedia/gals']],
                ['label' => 'Галерея встречи', 'url' => ['/mmedia/meet']],
                ['label' => 'Видео', 'url' => ['/mmedia/video']],
            ],
            ],                
            ['label' => 'О сайте', 'url' => ['/site/about']],
            ['label' => 'Регистрация', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                '<div>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-secondary logout']
                )
                . Html::endForm()
                . '</div>'
            )
        ];
    }
}
