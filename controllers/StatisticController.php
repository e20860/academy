<?php

namespace app\controllers;

use yii\db\Query;
use app\models\AcvTypes;
use app\models\Achievs;
use app\models\Graduates;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class StatisticController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['achievs','geo','rip'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['achievs','geo','rip'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            
        ];
    }

    /**
     *  Достижения выпускников курса
     * @return Html
     */
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
        return $this->render('achievs',[
            'list' => $list,
        ]);
    }

    /**
     *  Выводит карту оседания выпускников по жизни
     * @return html
     */
    public function actionGeo()
    {
        return $this->render('geo');
    }
    /**
     * Выводит список ушедших из жизни
     * @return html
     */
    public function actionRip()
    {
    
        $sql = 'SELECT `id`,(SELECT `name` FROM units '
                . 'WHERE units.id = graduates.units_id) AS `unit`,`fam`,'
                . '`nam`,`sur`,`photo2` FROM `graduates` WHERE `rip` = 1 ORDER BY `fam`';
        $list = \Yii::$app->db->createCommand($sql)
            ->queryAll();
        
        return $this->render('rip',[
            'list' => $list,
        ]);
    }

    /**
     *  Цифры и факты (интересная статистика). Знаете ли Вы?
     * @return type
     */
    public function actionStats()
    {
        return $this->render('stats');
    }

}
