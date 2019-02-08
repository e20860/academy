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
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 
                'skipOnEmpty' => false, 
                'extensions' => 'png, jpg', 
                'maxFiles' => 4
            ],
        ];
    }
    
    public function upload()
    {
        $path = Yii::$app->basePath . '/web/img/gal';
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs($path . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

}
