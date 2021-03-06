<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\graduates;
use app\modules\admin\models\GraduatesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GraduateController implements the CRUD actions for graduates model.
 */
class GraduateController extends Controller
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

    public function beforeAction($action)
    {
        if ($action->id === 'uploadpic') {    
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    } 

    /**
     * Lists all graduates models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->testUser();
        $searchModel = new GraduatesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single graduates model.
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
     * Creates a new graduates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new graduates();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing graduates model.
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
     *  Сохраняет файл портрета выпускника по AJAX-запросу
     * @return string
     */
    public function actionUploadpic()
    {
        $path = Yii::$app->basePath . '/web/img/portr/';
        $fname = $_FILES['imgFile']['name'];
        if (0 < $_FILES['imgFile']['error']) {
            return 'Ошибка: ' . $_FILES['imgFile']['error'] . '<br>';
        } else {
            move_uploaded_file($_FILES['imgFile']['tmp_name'], $path . $fname);
            return $fname;
        }
         
    }

    /**
     * Deletes an existing graduates model.
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
     * Finds the graduates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return graduates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = graduates::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function testUser() 
    {
        $access = Yii::$app->user->getIdentity()['accesstoken'];
        if(Yii::$app->user->isGuest || ($access != 'maa94-admin')) {
            $this->goHome();
        }
        
    }
    
}
