<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Название')->hint('Введите название слайда'); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true])->label('Текст')->hint('Введите полный текст'); ?>

    <?= $form->field($model, 'number')->Input('number', ['min' => 1, 'max' => 100])->label('Номер слайда')->hint('Введите какой слайд по номеру'); ?>

      <?= $form->field($model, 'href')->textInput(['maxlength' => true])->label('Ссылка')->hint('Вставьте ссылку в формате "https://сайт.." или "site/view?id=1"'); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
