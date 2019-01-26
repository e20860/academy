<?php

namespace app\controllers;

use Yii;
use app\models\Graduates;
use app\models\GraduatesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Units;
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
        ];
    }
    
    public function actionIndex()
    {
        $unit_id = Yii::$app->request->get('id');
        if(! $unit_id){
            $unit_id = 1;
        }
        
        $unit = Units::findOne($unit_id);
        $commander = Graduates::findOne($unit['commander']);
        
        $unitList = (new \yii\db\Query())
                ->select([
                    'graduates.id as id',
                    'units.name as unit',
                    'fam','nam','sur',
                    'photo1', 'photo2', 
                    'info', 'rip',
                    'locals.town as local',
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
     * Lists all Graduates models.
     * @return mixed
     */
    public function actionEdit()
    {
        $searchModel = new GraduatesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('edit', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Graduates model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Graduates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Graduates();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Graduates model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Graduates model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Graduates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Graduates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Graduates::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
