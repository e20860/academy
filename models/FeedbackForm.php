<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * FeedbackForm - форма обратной связи на странице О САЙТЕ.
 */
class FeedbackForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body обязательны
            [['name', 'email', 'subject', 'body'], 'required'],
            // email должен быть правильным email адресом
            ['email', 'email'],
            // verifyCode - проверяется капчей
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array заголовки полей формы (лейблы)
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Вы кто? (обязательно)',
            'email' => 'Адрес Вашей электронной почты (обязательно)',
            'subject' => 'О чём Вы хотпте нам рассказать (обязательно)',
            'body' => 'Содержание сообщения (обязательно)',
            'verifyCode' => 'Проверочка (а то ходют тут всякие)',
        ];
    }

    /**
     * Отправляет сообщение администратору сайта.
     * @param string $email адрес куда отправляется сообщение
     * @return bool Прошла ли валидация
     */
    public function feedback($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();
            return true;
        }
        return false;
    }
}
