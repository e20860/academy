<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "galleries".
 *
 * @property int $id
 * @property string $name
 * @property int $units_id
 * @property int $ord
 * @property string $descr
 *
 * @property GalImgs[] $galImgs
 */
class Galleries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galleries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'units_id', 'ord', 'descr'], 'required'],
            [['units_id', 'ord'], 'integer'],
            [['descr'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№пп',
            'name' => 'Наименование',
            'units_id' => 'Привязка к отделению',
            'ord' => 'Порядок показа',
            'descr' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalImgs()
    {
        return $this->hasMany(GalImgs::className(), ['gallery' => 'id']);
    }
}
