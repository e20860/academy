<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Menu;

/**
 * Description of Test
 *
 * @author admin
 */
class TestController extends Controller {
    
    public function actionMenu()
    {
        //$model = new Menu();
        $data = Menu::getMenuData();
        return $this->render('menu', ['model' => $data,]);
    }
}
