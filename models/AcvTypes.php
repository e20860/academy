<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acv_types".
 *
 * @property int $id
 * @property int $ord
 * @property string $name
 *
 * @property Achievs[] $achievs
 */
class AcvTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acv_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ord', 'name'], 'required'],
            [['ord'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievs()
    {
        return $this->hasMany(Achievs::className(), ['type' => 'id']);
    }
}
