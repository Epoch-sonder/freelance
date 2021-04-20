<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Выбор Тэгов';
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::dropDownList('tags', $selectedTags, $tags , ['class'=>'form-control','style'=>'height: 150px;margin-bottom:15px;', 'multiple'=>true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Выбрать', ['class'=>'btn btn=success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
