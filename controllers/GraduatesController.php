<?php

namespace app\controllers;

use Yii;
use app\models\Graduates;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Units;
use app\models\Locals;
use app\models\Contacts;
use app\models\CntTypes;
use app\models\Galleries;
use yii\filters\AccessControl;

/**
 * GraduatesController implements the CRUD actions for Graduates model.
 */
class GraduatesController extends Controller
{
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
                'only' => ['index','person','gallery'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','person','gallery'],
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
     *  Выводит список отделения
     * @return html
     */
    public function actionIndex()
    {
        $unit_id = Yii::$app->request->get('id');
        if(! $unit_id){  $unit_id = 1;}
        
        $unit = Units::findOne($unit_id);
        $commander = Graduates::findOne($unit['commander']);
        
        $unitList = (new \yii\db\Query())
                ->select([
                    'graduates.id as id','units.name as unit','fam','nam','sur',
                    'photo1', 'photo2', 'info', 'rip', 'locals.town as local',
                ])
                ->from('graduates')
                ->leftJoin('units','graduates.units_id = units.id')
                ->leftJoin('locals','graduates.locals_id = locals.id')
                 ->where(['units_id' => $unit_id])
                ->all();
 
        return $this->render('index', [
            'unitList'=>$unitList,
            'unit' =>$unit,
            'commander' => $commander,
            ]);
    } //index
    
    /**
     * Выводит модальное окнно с подробной информацией о выпускнике
     * @return Html
     */
    public function actionPerson()
    {
        if (Yii::$app->request->isAjax) {
            $request = \Yii::$app->request;
            $id = $request->get('id',1);
            $person = Graduates::findOne($id);
            $contacts = $person->contacts;
            $cntt = CntTypes::find()->asArray()->all();
            $cnt_types = [];
            foreach($cntt as $ct) {
                $cnt_types[$ct['id']] = $ct['name'];
            }
            $local = $person->local;
            return $this->renderAjax('person',[
                'person' => $person,
                'contacts' => $contacts,
                'local' => $local,
                'cnt_types' => $cnt_types,
            ]);
        }
    }
    /**
     * Галерея фотографий отделения
     * @return html
     */
    public function actionGallery()
    {
        $unit_id = \Yii::$app->request->get('id');
        $gallery = Galleries::findOne($unit_id);
        $photos = $gallery->galImgs;
        return $this->render('gallery',[
            'unit' => $unit_id,
            'gallery' => $gallery,
            'photos' => $photos,
        ]);
    }
}
