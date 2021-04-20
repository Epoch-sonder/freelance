<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-top: 70px; background: #f2f2f29e;"><p> </p></div>

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
.field-loginform-email {
  margin-top: 2.5rem;
  margin-bottom: 2.5rem;
  position: relative; }
.field-loginform-email label {
    position: absolute;
    top: 8px;
    padding: 4px 16px;
    -webkit-transition: 0.2s;
    transition: 0.2s; }
.field-loginform-email .form-control {
    height: 45px; }
.field-loginform-email label{
        font-weight: 60;
  }
label{
   color: #908888;
}

.field-loginform-password {
    margin-top: 2.5rem;
    margin-bottom: 2.5rem;
    position: relative; }
.field-loginform-password  label {
      position: absolute;
      top: 8px;
      padding: 4px 16px;
      -webkit-transition: 0.2s;
      transition: 0.2s; }
.field-loginform-password .form-control {
      height: 45px; }
.field-loginform-password  label{
          font-weight: 60;
    }
.button{ border-radius:6px; width: 100%;  }

.card {
    background-color: #fff;
    border-radius: 1.25rem;}


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
                    <h5 class="mb-5 text-center">Вход.</h5>
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'class'=>'form-control',
                        'fieldConfig' => [
                        'template'=> '<div>{input}{label}</div><div>{error}</div>',
                         'labelOptions' => ['class' => ' '],
                          ],

                    ]); ?>

                        <?= $form->field($model, 'email',['inputOptions' => ['class' => 'form-control click1']])->textInput()->label('Введите ваш email',['class' => 'emailjs'])  ?>
                        <?= $form->field($model, 'password',['inputOptions' => ['class' => 'form-control click2']])->passwordInput()->label('Введите ваш пароль',['class' => 'passwordjs']) ?>
                        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary button', 'name' => 'login-button']) ?>
                        <?php ActiveForm::end(); ?>


                        <a href="<?= Url::toRoute(['auth/signup'])?>" class="text-muted">Нет аккаунта? Зарегистрируйтесь!</a>
                        <p class="text-muted">или авторизуйтесь с помощью:</p>



                        <script type="text/javascript" src="https://vk.com/js/api/openapi.js?167"></script>
                        <script type="text/javascript">
                            VK.init({apiId: 7428123});
                        </script>
                    

                        <!-- VK Widget -->
                        <div id="vk_auth" style="width:100%;text-align: center; margin:auto;"></div>
                        <script type="text/javascript">
                            VK.Widgets.Auth("vk_auth", {"authUrl":"/auth/login-vk"});
                        </script>


                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.querySelector('.click1').onclick = function() {
        document.querySelector(".emailjs").style.webkitTransform = "translate(-0.75em, -109%) scale(0.9)";
        document.querySelector(".emailjs").style.Transform = "translate(-0.75em, -109%) scale(0.9)";
        document.querySelector(".emailjs").style.TextColor = "#3051D3";
    };
    document.querySelector('.click2').onclick = function() {
        document.querySelector(".passwordjs").style.webkitTransform = "translate(-0.75em, -109%) scale(0.9)";
        document.querySelector(".passwordjs").style.Transform = "translate(-0.75em, -109%) scale(0.9)";
        document.querySelector(".passwordjs").style.TextColor = "#3051D3";
    };
</script>
