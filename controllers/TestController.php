<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Menu;
use app\models\Contacts;
use app\models\CntTypes;
use yii\data\ActiveDataProvider;
use app\models\Locals;
use app\models\AcvTypes;
use app\models\Achievs;
use app\models\Graduates;

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
    
    public function actionGeo()
    {
        $sql = "SELECT `town`, CONCAT('[',`crd`,']') AS `crd`,"
                . "(SELECT COUNT(*) FROM graduates "
                . "WHERE graduates.locals_id = locals.id AND NOT graduates.rip) AS quant, "
                . "(SELECT GROUP_CONCAT(`fam` SEPARATOR '-') FROM graduates "
                . "WHERE `locals_id` =locals.id GROUP BY `locals_id`) AS `hint` "
                . "FROM locals WHERE locals.id <> 50 ";
        $list = \Yii::$app->db->createCommand($sql)
            ->queryAll();

        $json = json_encode($list,JSON_UNESCAPED_UNICODE);
        $json = preg_replace('/"\[/m','[', $json);
        $json = preg_replace('/\]"/m',']', $json);

        $file = Yii::$app->basePath .'\web\temp\statistic.txt';
        file_put_contents($file, $json);
        return $this->render('test',[
            'json' => $json,
        ]);
    }
    
    public function actionLocals()
    {
        $query = Locals::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => 30,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                    'country' => SORT_ASC,
                    'town' => SORT_ASC,
                ],
            ],
        ]);
        $towns = $provider->getModels();
        return $this->render('locals', [
            'provider' => $provider,
            'towns' => $towns,
        ]);
    }
    
    public function actionAchievs()
    {
        $list = [];
        $atypes = AcvTypes::find()
                ->orderBy('ord')
                ->all();
        foreach ($atypes as $type) {
            $acvGrads = Achievs::find()
                    ->where(['type' => $type['id']])
                    ->with('graduates')
                    ->asArray()
                    ->all();
            if($acvGrads) {
                $list[$type['name']] = $acvGrads;
            }
        }
        return $this->render('test',[
            'list' => $list,
        ]);
    }
}
