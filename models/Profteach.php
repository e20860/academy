<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profteach".
 *
 * @property int $id
 * @property string $name
 * @property string $subject
 * @property string $img
 */
class Profteach extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profteach';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'subject', 'img'], 'required'],
            [['name', 'subject'], 'string', 'max' => 255],
            [['img'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'subject' => 'Subject',
            'img' => 'Img',
        ];
    }
}
