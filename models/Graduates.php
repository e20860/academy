<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "graduates".
 *
 * @property int $id
 * @property int $units_id
 * @property string $fam
 * @property string $nam
 * @property string $sur
 * @property string $photo1
 * @property string $photo2
 * @property string $info
 * @property int $rip
 * @property int $locals_id
 *
 * @property Achievs[] $achievs
 * @property Contacts[] $contacts
 * @property Units $units
 * @property Locals $locals
 * @property Users $users
 */
class Graduates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'graduates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['units_id', 'fam', 'nam', 'sur', 'photo1', 'photo2', 'info', 'rip', 'locals_id'], 'required'],
            [['units_id', 'rip', 'locals_id'], 'integer'],
            [['info'], 'string'],
            [['fam', 'nam', 'sur'], 'string', 'max' => 30],
            [['photo1', 'photo2'], 'string', 'max' => 255],
            [['units_id'], 'exist', 'skipOnError' => true, 'targetClass' => Units::className(), 'targetAttribute' => ['units_id' => 'id']],
            [['locals_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locals::className(), 'targetAttribute' => ['locals_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'units_id' => 'Отделение',
            'fam' => 'Фамилия',
            'nam' => 'Имя',
            'sur' => 'Отчество',
            'photo1' => 'Фото №1',
            'photo2' => 'Фото №2',
            'info' => 'Информация',
            'rip' => 'Состояние',
            'locals_id' => 'Проживает',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievs()
    {
        return $this->hasMany(Achievs::className(), ['graduates_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contacts::className(), ['graduates_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Units::className(), ['id' => 'units_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocal()
    {
        return $this->hasOne(Locals::className(), ['id' => 'locals_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['graduates_id' => 'id']);
    }
}
