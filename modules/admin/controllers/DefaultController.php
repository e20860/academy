<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->testUser();
        return $this->render('index');
    }

    protected function testUser() 
    {
        $access = Yii::$app->user->getIdentity()['accesstoken'];
        if(Yii::$app->user->isGuest || ($access != 'maa94-admin')) {
            $this->goHome();
        }
        
    }
    
}
