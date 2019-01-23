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
                ['label' => 'Академии', 'url' => ['/management/top']],
                ['label' => 'Факультета', 'url' => ['/management/faculty']],
                '<div class="dropdown-divider"></div>',
                ['label' => 'Преподаватели', 'url' => ['/management/profteach']],
            ],
            ],                
            ['label' => 'Отделения', 'items' => [
                ['label' => '10 учебное отделение', 'url' => ['/test/menu']],
            ],    
            ],    
            ['label' => 'О сайте', 'url' => ['/site/about']],
            ['label' => 'Регистрация', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ];
    }
}
