<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "achievs".
 *
 * @property int $id
 * @property int $graduates_id
 * @property int $type
 * @property string $descr
 *
 * @property AcvTypes $type0
 * @property Graduates $graduates
 */
class Achievs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'achievs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'graduates_id', 'type', 'descr'], 'required'],
            [['id', 'graduates_id', 'type'], 'integer'],
            [['descr'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => AcvTypes::className(), 'targetAttribute' => ['type' => 'id']],
            [['graduates_id'], 'exist', 'skipOnError' => true, 'targetClass' => Graduates::className(), 'targetAttribute' => ['graduates_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'graduates_id' => 'Graduates ID',
            'type' => 'Type',
            'descr' => 'Descr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(AcvTypes::className(), ['id' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraduates()
    {
        return $this->hasOne(Graduates::className(), ['id' => 'graduates_id']);
    }
}
