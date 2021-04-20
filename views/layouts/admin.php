<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\PublicAsset;
use yii\helpers\Url;
$this->title = 'Админ панель';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<style>

</style>
<div class="wrap">
    <style>
    nav, footer{
      box-shadow: 0px 2px 10px rgba(0,0,0, .3);
    }
    body{
      background-image: url("../../web/public/images/body_all2.png");
      background-size: cover;
      background-position: center;
    }
        .navbar-inverse{
            background-color: #0f4c81;
            border-color: #0f4c81;
        }
        .navbar-inverse .navbar-brand , .navbar-inverse .navbar-nav > li > a{
            color:#fff;
        }
        .navbar-inverse .navbar-nav > .active > a {color: #4285f4;
    background-color: #f5f5f5;}

    </style>


    <?php
    NavBar::begin([
        'brandLabel' => 'Новости.8решений.рф',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Статьи', 'url' => ['/admin/article/index']],
            ['label' => 'Коментарии', 'url' => ['/admin/comment/index']],
            ['label' => 'Тэги', 'url' => ['/admin/tag/index']],
            ['label' => 'Категории', 'url' => ['/admin/category/index']],
            ['label' => 'Слайдер', 'url' => ['/admin/slider/index']],

        ],
    ]);
    NavBar::end();
    ?>
    <a href="<?= Url::toRoute(['/admin']);?>">Admin</a>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-right"> Новости.8решений.рф &copy; <?= date('Y') ?></p>

        <a class="pull-left" href="<?= Url::toRoute(['/admin'])?>">
                      Admin </a>
          </p>
    </div>
</footer>

<?php $this->endBody() ?>
<?php $this->registerJsFile('/ckeditor/ckeditor.js'); ?>
<?php $this->registerJsFile('/ckfinder/ckfinder.js'); ?>
<script>
    $(document).ready(function(){
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor( editor );
    })

</script>
</body>
</html>
<?php $this->endPage() ?>
