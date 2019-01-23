<?php

namespace app\models;

use Yii;
use app\models\MenuRecord;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property int $parent
 */

class Menu
{
    public $id;
    public $name;
    public $link;
    public $parent;
    
    
    public static function getMenuData()
    {
        $data = MenuRecord::find()->asArray()->all();
        $tree = self::getTree($data);
        $menu = self::renderMenu($tree);
        return $menu;
    }

    /**
     * Преобразует массив данных в дерево меню
     * струтура массива:
     * строки следующего выда:
     * [$id]  => ['name'=>'$itemName', 'link'=>'$menuItemLink', 'parent'=>$parentId]
     * где $id - id пункта меню
     * $itemName - наименование пункта меню
     * $menuItemLink - ссылка данного пункта меню
     * $parentId - указатель на родительский пункт (0-для верхнего уровня)
     * 
     * @param array $data
     * @return array
     */
    protected static function getTree($data)
    {
        $tree = [];
	foreach ($data as $id=>&$node) {    
            if (!$node['parent']){
		$tree[$id] = &$node;
            } else { 
		$data[$node['parent']-1]['childs'][$id] = &$node;
            }
	}
        return $tree;
    }
    
    protected static function renderMenu($tree)
    {
        $menu = [];
        $surl = '/web/index.php?r=';
        foreach ($tree as $item) {
            if(isset($item['childs'])) {
                $items = [];
                foreach ($item['childs'] as $si) {
                    $items[] = ['label' => $si['name'], 'url' => $surl . $si['link']];
                }
                $menu[] = ['label' => $item['name'], 'items' => $items];
            } else {
                $menu[] = ['label' => $item['name'], 'url' => $surl . $item['link']];
            }
        }
        return $menu;
    }


}
