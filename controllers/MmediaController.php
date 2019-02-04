<?php

namespace app\controllers;

use app\models\Galleries;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class MmediaController extends \yii\web\Controller
{
    /**
     * Поведения (доступ)
     * @return type
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
                'only' => ['gals','meet','video','show'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['gals','meet','video','show'],
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
     *  Выводит список галерей для просмотра
     * @return html
     */
    
    public function actionGals()
    {
        $galleries = Galleries::find()
                ->with('galImgs')
                ->orderBy('ord')
                ->asArray()
                ->all();
        return $this->render('gals',[
            'galleries' => $galleries,
        ]);
    }

    /**
     * Выводит галерею встречи выпускников
     * @return type
     */
    public function actionMeet()
    {
        $gallery = Galleries::findOne(12);
        $photos = $gallery->galImgs;
        return $this->render('meet',[
            'gallery' => $gallery,
            'photos' => $photos,
        ]);
    }

    /**
     * Выводит перечень имеющихся видео доя просмотра
     * @return type
     */
    public function actionVideo()
    {
        $videos = \app\models\Video::find()
                ->asArray()
                ->all();
        return $this->render('video',[
            'videos' => $videos,
        ]);
    }
    /**
     * Выводит фотографии одной галереи по её ID (параметр)
     * @param type $id integer
     * @return html
     */
    public function actionShow($id)
    {
        $gallery = Galleries::findOne($id);
        $photos = $gallery->galImgs;
        return $this->render('gallery',[
            'gallery' => $gallery,
            'photos' => $photos,
        ]);
        
    }
    

}
