<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\Html;
/**
 * Меню прогаммы
 *
 * @author admin
 */
class Menu21 extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'menu';
    }
    
    public static function getMenuArray()
    {
        return [
            ['label' => 'На сайт', 'url' => ['/site/index']],
            ['label' => 'Главная админки', 'url' => ['/admin']],
            ['label' => 'Пользователи', 'url' => ['/admin/users']],                
            ['label' => 'Отделения', 'url' => ['/admin/unit']],
            ['label' => 'Выпускники', 'items' =>[
                ['label'=>'Персоналии', 'url' => ['/admin/graduate']],
                ['label' => 'Контакты', 'url' => ['/admin/contact']],
                ['label' => 'Достижения', 'url' => ['/admin/achiev']],
            ]],
            ['label' => 'Фотогалереи', 'url' => ['/admin/gallery']],
            ['label' => 'Видео', 'url' => ['/admin/video']],
            ['label' => 'Города', 'url' => ['/admin/local']],
        ];
    }
}
