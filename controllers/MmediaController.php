<?php

namespace app\controllers;

use app\models\Galleries;

class MmediaController extends \yii\web\Controller
{
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

    public function actionMeet()
    {
        $gallery = Galleries::findOne(12);
        $photos = $gallery->galImgs;
        return $this->render('meet',[
            'gallery' => $gallery,
            'photos' => $photos,
        ]);
    }

    public function actionVideo()
    {
        $videos = \app\models\Video::find()
                ->asArray()
                ->all();
        return $this->render('video',[
            'videos' => $videos,
        ]);
    }
    
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
