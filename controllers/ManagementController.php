<?php

/*
 * No License (OPEN GNU)
 * Author E.Slavko <e20860@mail.ru>
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Пунтк меню Руководство
 *
 * @author admin
 */
class ManagementController extends Controller {
     /**
     * {@inheritdoc}
     */   
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
                'only' => ['top','faculty','profteach'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['top','faculty','profteach'],
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
     *  Руководство академии
     * @return html
     */
    
    public function actionTop()
    {
        return $this->render('top');
    }

    public function actionFaculty()
    {
        return $this->render('faculty');
    }
    
    public function actionProfteach()
    {
        $tlist = \app\models\Profteach::find()->asArray()->all();
        return $this->render('profteach',['tlist' => $tlist]);
    }
    
}
