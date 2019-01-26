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
            [['img'], 'string', 'max' => 255],
            [['gallery'], 'exist', 'skipOnError' => true, 'targetClass' => Galleries::className(), 'targetAttribute' => ['gallery' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery' => 'Gallery',
            'img' => 'Img',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery0()
    {
        return $this->hasOne(Galleries::className(), ['id' => 'gallery']);
    }
}
