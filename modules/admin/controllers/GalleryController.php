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
     * Lists all Galleries models.
     * @return mixed
     */
    public function actionIndex()
    {
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
        return $this->render('view', [
            'model' => $this->findModel($id),
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
        $path = Yii::$app->basePath . '.web/img/gal';
        $fname = $_FILES['file']['name'];
        if (0 < $_FILES['file']['error']) {
            return 'Ошибка: ' . $_FILES['file']['error'] . '<br>';
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], $path . $_FILES['file']['name']);
            $gif = new GalImgs();
            $gif->gallery = $gal;
            $gif->img = $fname;
            $gif->save();
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
}
