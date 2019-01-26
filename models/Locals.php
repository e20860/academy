<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locals".
 *
 * @property int $id
 * @property string $country
 * @property string $town
 * @property string $crd
 *
 * @property Graduates[] $graduates
 */
class Locals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country', 'town', 'crd'], 'required'],
            [['country'], 'string', 'max' => 10],
            [['town'], 'string', 'max' => 30],
            [['crd'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'town' => 'Town',
            'crd' => 'Crd',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraduates()
    {
        return $this->hasMany(Graduates::className(), ['locals_id' => 'id']);
    }
}
