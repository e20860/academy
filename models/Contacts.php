<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property int $type
 * @property int $graduates_id
 * @property string $cont_info
 *
 * @property Graduates $graduates
 * @property CntTypes $type0
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'graduates_id', 'cont_info'], 'required'],
            [['type', 'graduates_id'], 'integer'],
            [['cont_info'], 'string', 'max' => 255],
            [['graduates_id'], 'exist', 'skipOnError' => true, 'targetClass' => Graduates::className(), 'targetAttribute' => ['graduates_id' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => CntTypes::className(), 'targetAttribute' => ['type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'graduates_id' => 'Graduates ID',
            'cont_info' => 'Cont Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraduates()
    {
        return $this->hasOne(Graduates::className(), ['id' => 'graduates_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(CntTypes::className(), ['id' => 'type']);
    }
}
