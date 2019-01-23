<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Регистрация';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="text-primary text-center"><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Здравствуте, сообщество выпускников 1994 года радо пополнится новым товарищем.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <div class="row">
          <div class="col-sm-12">
                <div class="jumbotron jumbotron-fluid pt-1 pb-1">
                  <div class="container">
                        <p class="h4"><span class="ml-4"></span>Порядок регистрации </p>
                        <p class="pt-2 lead">Поскольку информация, размещённая на сайте достаточно конфиденциальна, порядок регистрации следующий:</p>
                        <div class="text-left">
                        <ul>
                                <li>Вы заполняете форму, расположенную ниже и указываете контактные данные</li>
                                <li>Администрация сайта в течении определённого времени (до 3 суток) рассматривает Вашу заявку и принимант решение на регистрацию</li>
                                <li>В случае принятия положительного решения информация заносится в базу данных и на указанные Вами контакты высылается регистрационная информация.</li>
                                <li>На основании полученной информации Вы получаете доступ к ресурсам сайта.</li>

                        </ul>
                        </div>    
                  </div>
                </div>
          </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
