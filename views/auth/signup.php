<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-top: 70px;"><p> </p></div>

<style>
    header, footer{
        background: #fff;
    }
body{
  background-image: url("public/images/body_reg.png");
  background-size: cover;
  background-position: center;
  background-color: #4285f4!important;
}

.field-signupform-email {
  margin-top: 2.5rem;
  margin-bottom: 2.5rem;
  position: relative; }

  .field-signupform-email label {
    position: absolute;
    top: 8px;
    padding: 4px 16px;
    -webkit-transition: 0.2s;
    transition: 0.2s; }
  .field-signupform-email .form-control {
    height: 45px; }
  .field-signupform-email label{
        font-weight: 60;
  }

    .field-signupform-name {
        margin-top: 2.5rem;
        margin-bottom: 2.5rem;
        position: relative; }
    .field-signupform-name label {
        position: absolute;
        top: 8px;
        padding: 4px 16px;
        -webkit-transition: 0.2s;
        transition: 0.2s; }
    .field-signupform-name .form-control {
        height: 45px; }
    .field-signupform-name label{
        font-weight: 60;
    }

  .field-signupform-password {
    margin-top: 2.5rem;
    margin-bottom: 2.5rem;
    position: relative; }
    .field-signupform-password label {
      position: absolute;
      top: 8px;
      padding: 4px 16px;
      -webkit-transition: 0.2s;
      transition: 0.2s; }
    .field-signupform-password .form-control {
      height: 45px; }
    .field-signupform-password label{
          font-weight: 60;
    }
    .button{
        border-radius:6px;
      width: 100%;
    }

    label{
       color: #908888;
    }
  .card {
    background-color: #fff;
    border-radius: 1.25rem;
  }

  .text-muted{
    text-align: center;
    width: 100%;
    font-size: 1.2em;
    margin-top: 30px;
  }

</style>
<div class="row justify-content-center">
    <div class="col-xl-5 col-sm-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="p-2">
                    <h5 class="mb-5 text-center">Регистрация</h5>
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'class'=>'form-control',
                        'fieldConfig' => [
                        'template'=> '<div>{input}{label}</div><div>{error}</div>',
                         'labelOptions' => ['class' => ' '],
                          ],

                    ]); ?>

                        <?= $form->field($model, 'name',['inputOptions' => ['class' => 'form-control click1']])->textInput()->label('Имя пользователя',['class' => 'namejs']) ?>
                        <?= $form->field($model, 'email',['inputOptions' => ['class' => 'form-control click2']])->textInput()->label('Ваш email',['class' => 'emailjs']) ?>
                        <?= $form->field($model, 'password',['inputOptions' => ['class' => 'form-control click3', 'minlength' => '6',],])->passwordInput()->label('Придумайте ваш пароль',['class' => 'passwordjs']) ?>

                      <div class="mt-4">
                          <?= Html::submitButton('Зарегестрироваться', ['class' => 'btn btn-primary button', 'name' => 'login-button']) ?>
                      </div>
                        <p class="custom-control-label font-weight-normal" for="term-conditionCheck"> Нажимая на кнопку "Зарегистрироваться", вы соглашаетесь с  <a href="http://xn--8-jtbamfws9d.xn--p1ai/web/site/offerta" class="text-primary">договором оферты</a> и политикой обработки персональных данных </p>

                          <?php ActiveForm::end(); ?>
                        <a href="<?= Url::toRoute(['auth/login'])?>" class="text-muted"> Уже зарегистрированы? Авторизуйтесь!</a>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.click1').onclick = function() {
        document.querySelector(".namejs").style.webkitTransform = "translate(-0.75em, -109%) scale(0.9)";
        document.querySelector(".namejs").style.Transform = "translate(-0.75em, -109%) scale(0.9)";
        document.querySelector(".namejs").style.TextColor = "#3051D3";
    };
    document.querySelector('.click2').onclick = function() {
        document.querySelector(".emailjs").style.webkitTransform = "translate(-0.75em, -109%) scale(0.9)";
        document.querySelector(".emailjs").style.Transform = "translate(-0.75em, -109%) scale(0.9)";
        document.querySelector(".emailjs").style.TextColor = "#3051D3";
    };
    document.querySelector('.click3').onclick = function() {
        document.querySelector(".passwordjs").style.webkitTransform = "translate(-0.75em, -109%) scale(0.9)";
        document.querySelector(".passwordjs").style.Transform = "translate(-0.75em, -109%) scale(0.9)";
        document.querySelector(".passwordjs").style.TextColor = "#3051D3";
    };
</script>