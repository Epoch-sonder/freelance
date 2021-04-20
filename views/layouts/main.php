<?php

/* @var $this \yii\web\View */
/* @var $content string */


use app\assets\AppAsset;
use app\assets\PublicAsset;


use yii\helpers\Html;
use yii\helpers\Url;
PublicAsset::register($this); ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<? $this->beginBody() ?>
<body>
<style>
    .search {
        margin-top: 9px;
        margin-bottom: 9px;
        max-height: 40px;
        max-width: 184px;
    }
    .search, .inptsearh {
        border-radius: 1.2rem;
        background-color: #fff;
    }
    .inptsearh, .btnsearch {
        display: inline-block;
    }
    .inptsearh:focus, .btnsearch:focus {
        outline: 0;
    }
    .inptsearh {
        color: inherit;
        width: 70%;
        padding: 0.46rem 0.5rem;
        margin-top: 2px;
        padding-left: 1rem;
        border: none;
        float: left;
    }
    .btnsearch {
        color: inherit;
        margin: 1px 10px 1px 15px;
        border: none;
        cursor: pointer;
        border-radius: 50%;
        float: right;
    }
    .clearfix:after {
        content: '';
        display: table;
        clear: both;
    }

</style>
<header>
    <div class="bottom-area">
        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-ios-menu"></i></div>
        <ul class="main-menu visible-on-click" id="main-menu">
            <li class="drop-dow" ><a href="/">Новости.8решений.рф</a></li>
            <li><a href="<?= Url::toRoute(['site/categoryall']);?>">Категории</a></li>
            <li><a href="<?= Url::toRoute(['site/about']);?>">О нас</a></li>
            <?php if(Yii::$app->user->isGuest): ?>
            <li><a href="<?= Url::toRoute(['auth/login'])?>">Вход</a></li>
            <li><a href="<?= Url::toRoute(['auth/signup'])?>">Регистрация</a></li>
            <?php else: ?>
            <li class="drop-down"><a href="#!"><?=  Yii::$app->user->identity->name?><i class="ion-ios-arrow-down"></i></a>
                <ul class="drop-down-menu">
                    <li><a href="<?= Url::toRoute(['/auth/logout'])?>"><?= Html::beginForm(['/auth/logout'], 'post')
                            . Html::submitButton(
                                'Выйти',
                                ['class' => '', 'style'=>"font-family: Times New Roman,Times,serif;"]
                            )
                            . Html::endForm()?></a></li>
                </ul>
            <?php endif; ?>
            <li><div  class="search clearfix"><form style="display:inline-block" action="<?= Url::to(['site/search'])  ?>">
                        <input  type="text" method="get" class="inptsearh" minlength="1" placeholder="Поиск по сайту" name="q"/>
                        <button type="submit" class="btnsearch"><i style="font-size: 1.8em;font-weight: 300;" class="ion-ios-search"></i></button>
                    </form></div></li>

        </ul>

    </div>
</header>

<?=$content ?>


<footer>
    <div class="container">
        <div class="row">

            <div class="col-sm-6">
                <div class="footer-section">
                    <p class="copyright">8решений&copy; <?= date('Y') ?>. All rights reserved.</p>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="footer-section">
                    <ul class="social-icons">
                        <li><a href="#"><i class="ion-logo-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-logo-instagram"></i></a></li>
                        <li><a href="#"><i class="ion-logo-youtube"></i></a></li>
                        <li><a href="#"><i class="ion-logo-vk"></i></a></li>


                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<? $this->endBody() ?>
</body>
<?php $this->endPage() ?>
