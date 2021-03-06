<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $graduates_id
 * @property string $username
 * @property string $password
 * @property string $authkey
 * @property string $accesstoken
 *
 * @property Graduates $graduates
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'graduates_id', 'username', 'password', 'accesstoken'], 'required'],
            [['id', 'graduates_id'], 'integer'],
            [['username'], 'string', 'max' => 30],
            [['password', 'authkey', 'accesstoken'], 'string', 'max' => 255],
            [['graduates_id'], 'unique'],
            [['id'], 'unique'],
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
            'graduates_id' => 'Выпускник',
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'authkey' => 'Авторизация',
            'accesstoken' => 'Ключ доступа',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGraduates()
    {
        return $this->hasOne(Graduates::className(), ['id' => 'graduates_id']);
    }
    
    public function getGradName()
    {
        $grad = $this->getGraduates()->asArray()->one();
        return $grad['fam'];
    }
        /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }
    
}
