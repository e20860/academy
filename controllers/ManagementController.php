<?php

/*
 * No License (OPEN GNU)
 * Author E.Slavko <e20860@mail.ru>
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;


/**
 * Пунтк меню Руководство
 *
 * @author admin
 */
class ManagementController extends Controller {
    /**
     *  Руководство академии
     * @return html
     */
    
    public function actionTop()
    {
        return $this->render('top');
    }

    public function actionFaculty()
    {
        return $this->render('faculty');
    }
    
    public function actionProfteach()
    {
        return $this->render('profteach');
    }
    
}
