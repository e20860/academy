<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property int $ord
 * @property string $name
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
            [['descr', 'link'], 'required'],
            [['ord'], 'integer'],
            [['descr'], 'string'],
            [['link'], 'string', 'max' => 255],
            [['ord'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№пп',
            'ord' => 'Порядок',
            'name' => 'Наименование',
            'descr' => 'Описание',
            'link' => 'Ссылка',
        ];
    }
}
