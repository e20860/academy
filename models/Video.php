<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property int $ord
 * @property string $descr
 * @property string $link
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ord', 'descr', 'link'], 'required'],
            [['ord'], 'integer'],
            [['descr'], 'string'],
            [['link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ord' => 'Ord',
            'descr' => 'Descr',
            'link' => 'Link',
        ];
    }
}
