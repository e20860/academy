<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gal_imgs".
 *
 * @property int $id
 * @property int $gallery
 * @property string $img
 *
 * @property Galleries $gallery0
 */
class GalImgs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gal_imgs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gallery', 'img'], 'required'],
            [['gallery'], 'integer'],
            [['img'], 'file', 
                'skipOnEmpty' => false, 
                'extensions' => 'png, jpg, jpeg', 
            ],
            [['gallery'], 'exist', 'skipOnError' => true, 'targetClass' => Galleries::className(), 'targetAttribute' => ['gallery' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'gallery' => '№ галереи',
            'img' => 'Имя файла',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery0()
    {
        return $this->hasOne(Galleries::className(), ['id' => 'gallery']);
    }
    
    public function upload()
    {
       $path = Yii::$app->basePath . '/web/img/gal';
       if ($this->validate()) {
            $this->img->saveAs($path . $this->img->baseName . '.' . $this->img->extension);
            return true;
        } else {
            return false;
        }
    }
    
}
