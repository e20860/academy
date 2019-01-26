<?php

namespace app\controllers;

class MediaController extends \yii\web\Controller
{
    public function actionGaleries()
    {
        return $this->render('galeries');
    }

    public function actionMeeteng()
    {
        return $this->render('meeteng');
    }

    public function actionVideo()
    {
        return $this->render('video');
    }

}
