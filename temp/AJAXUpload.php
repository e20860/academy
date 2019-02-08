<?php
/*
Ajax загрузка файлов Yii2

Для загрузки через ajax пишем следующий код:
//---------------------------------------------------------
View — дописываем Javascript для отправки данных по ajax
*/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Krujki */
 
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Моя страница'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 
$script = "
    $('#myForm').submit(function(e){
        var formData = new FormData($(this)[0]);        
        $.ajax({
            type: 'post',
            url:'". Url::to(['myFunction'])."',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                 
            }
        })  
        e.preventDefault();
         
        return false;
    });     
";
$this->registerJs($script);
?>
 
<form id="myForm">                
    <input id="idmodel" type="hidden" name="idmodel"  value="<?=$model->id;?>" />
    <input id="myFiles" type="file" name="myFiles"/>
    <input type="submit" value="Загрузить">
</form>
<!--
//---------------------------------------------------------------------------------
/*
Controller — в контроллере необходимо отключить проверку CSRF для вашего action куда будет посылаться обработка данных через ajax
*/
-->
<?php
 
namespace backend\controllers;
 
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
 
class MyController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
 
    // ОТКЛЮЧАЕМ CSRF
    public function beforeAction($action)
    {
        if ($action->id === 'myFunction') {    
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    } 
     
    // AJAX ЗАГРУЗКА
    public function actionMyFunction()
    {
        $key = Yii::$app->request->post();
        $file = $_FILES;
         
        $id = $key['idmodel'];
        $model = $this->findModel($id);      
        $model->myFiles = UploadedFile::getInstanceByName('myFiles');        
        if ($model->myUpload()) {
            $model->save(false);
        }                   
    }
}

//-----------------------------------------------------------------------
/*
Model — в модель дописываем функцию для сохранения файла
*/
public function myUpload()
{       
    if ($this->validate()) { 
         
        $names='';        
         
        $filename = Yii::$app->getSecurity()->generateRandomString(15);// Генерируем название файла при сохранение   
        $file = $this->myFiles;                      
        $file->saveAs('uploads/' . $filename . '.' . $file->extension);
        $names.= $filename . '.' . $file->extension;
         
        $this->path=$names;//Поле в базе куда сохраняем название
        return true;
    } else {
         
        return false;
    }
}
