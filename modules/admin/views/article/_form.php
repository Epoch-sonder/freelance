<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Название поста')->hint('Введите название поста') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Превью')->hint('Введите превью') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->label('Полный текст')->hint('Введите полный текст') ?>

    <?=$form->field($model,'readtime') ->Input('number', ['min' => 1, 'max' => 100])->label('Время дочитывания статьи')->hint('Введите примерное время дочитывания статьи от 1 до 100')?>

    <?= $form->field($model, 'date')->textInput(['value' => date('Y-m-d')])->label('Дата')->hint('Введите дату создания') ?>

    <?= $form->field($model, 'time')->textInput(['value' => date('H:i')])->label('Время')->hint('Введите время создания') ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
