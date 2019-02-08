<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Description of UploadGalImg
 *
 * @author admin
 */
class UploadGalImg extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 
                'skipOnEmpty' => false, 
                'extensions' => 'png, jpg, jpeg', 
            ],
        ];
    }
    
    public function upload()
    {
       $path = Yii::$app->basePath . '/web/img/gal';
       if ($this->validate()) {
            $this->imageFile->saveAs($path 
                    . $this->imageFile->baseName 
                    . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

}
