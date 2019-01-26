<?php

namespace app\controllers;

class StatisticController extends \yii\web\Controller
{
    public function actionAchievs()
    {
        return $this->render('achievs');
    }

    public function actionGeo()
    {
        return $this->render('geo');
    }

    public function actionRip()
    {
        return $this->render('rip');
    }

    public function actionStats()
    {
        return $this->render('stats');
    }

}
