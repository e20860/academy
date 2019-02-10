<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Galleries;
use app\models\GalImgs;
use app\modules\admin\models\UploadGalImg;
use app\modules\admin\models\GalleriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * GalleryController implements the CRUD actions for Galleries model.
 */
class GalleryController extends Controller
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
    /**
     *  Отключает проверку при загрузке AJAX
     * @param type $action
     * @return type
     */
    public function beforeAction($action)
    {
        if ($action->id === 'uploadpic') {    
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    } 

    
    /**
     * Lists all Galleries models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->testUser();
        $searchModel = new GalleriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Galleries model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $images = new ActiveDataProvider([
            'query' => GalImgs::find()->where(['gallery' => $id]),
            'pagination' => [
                'pageSize' => 30,
            ],
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'images' => $images,
        ]);
    }

    /**
     * Creates a new Galleries model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Galleries();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Galleries model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $images = new ActiveDataProvider([
            'query' => GalImgs::find()->where(['gallery' => $id]),
            'pagination' => [
                'pageSize' => 30,
            ],
        ]);
        $upimg = new UploadGalImg();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'images' => $images,
            'upimg' => $upimg,
        ]);
    }
    
    public function actionDelpic($id,$gal)
    {
        $imgRec = GalImgs::findOne($id);
        $imgRec->delete();
        return $this->redirect(['update', 'id' => $gal]);
    }

    public function actionUploadpic()
    {
        $key = Yii::$app->request->post();
        $gal = $key['idmodel'];
        $path = Yii::$app->basePath . '/web/img/gal/';
        $fname = $_FILES['imgFile']['name'];
        //return json_encode($gal);
        if (0 < $_FILES['imgFile']['error']) {
            return 'Ошибка: ' . $_FILES['imgFile']['error'] . '<br>';
        } else {
            move_uploaded_file($_FILES['imgFile']['tmp_name'], $path . $_FILES['imgFile']['name']);
            $gif = new GalImgs();
            $gif->gallery = $gal;
            $gif->img = $fname;     //UploadedFile::getInstanceByName($fname);
//            if ($gif->upload()) {
//                $gif->save(false);
//            }                   
            $gif->save(false);
            echo 'Файл загружен';
         }
         return $this->redirect(['update','id' =>$gal]);

    }

    /**
     * Deletes an existing Galleries model.
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
     * Finds the Galleries model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Galleries the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Galleries::findOne($id)) !== null) {
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
