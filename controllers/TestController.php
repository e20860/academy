<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Menu;
use app\models\Contacts;
use app\models\CntTypes;


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
    
    public function actionContacts()
    {
        for ($i = 1; $i < 152 ; $i++) {
            for($j = 1; $j < 4; $j++) {
                $cod = new Contacts();
                $cod->type = $j;
                $cod->graduates_id = $i;
                $cod->cont_info = 'нет данных';
                $cod->save();
            }
        }
        
        $model = Contacts::find()->asArray()->all();
        return $this->render('test', ['model' => $model]);
    }
}
