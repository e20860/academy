<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "units".
 *
 * @property int $id
 * @property int $ord
 * @property string $name
 * @property string $descr
 * @property int $commander
 *
 * @property Graduates[] $graduates
 */
class Units extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'units';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ord', 'name', 'descr', 'commander'], 'required'],
            [['ord', 'commander'], 'integer'],
            [['descr'], 'string'],
            [['name'], 'string', 'max' => 30],
            [['commander'], 'unique'],
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
            'name' => 'Name',
            'descr' => 'Descr',
            'commander' => 'Commander',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraduates()
    {
        return $this->hasMany(Graduates::className(), ['units_id' => 'id']);
    }
}
