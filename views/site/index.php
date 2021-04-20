<?php

use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'News 8decisions.group';
$this->registerJsFile('public/js/carousel.js');

?>

<style>
    .breadcrumb {
        background: #f2f2f200;
        margin-bottom: 0px;
    }

    .sort p {
        margin-top: 5px;
        line-height: 1;
        font-size: .8em;
        display: inline-block;
    }


    .form-control {
        margin-top: 4px;
        margin-bottom: 4px;
        margin-left: 5px;
        font-size: 0.8rem;
    }
</style>

<section style="margin-top: 70px;"><h1></h1></section>
<section class="carousel">
    <div class="carousel-container">
        <?php foreach ($slider as $sliders):?>
        <div class="carousel-slide carousel-fade">
            <a href="<?= $sliders->getHref(); ?>"><img src="<?= $sliders->getImage(); ?>"></a>
            <div class="carousel-text">
                <h5><?= $sliders->title; ?></h5>
                <p class="text"><?= $sliders->description; ?></p>
            </div>
        </div>
        <?php endforeach; ?>

        <a class="carousel-prev" onclick="plusSlides(-1)"><i class="ion-ios-arrow-back" style="color:#fff;"></i></a>
        <a class="carousel-next" onclick="plusSlides(1)"><i class="ion-ios-arrow-forward" style="color:#fff;"></i></a>
    </div>

    <div class="carousel-dots">
        <?php foreach ($slider as $items):?>
        <span class="carousel-dot" onclick="currentSlide(<?= $items->number?>)"></span>
        <?php endforeach; ?>
    </div>



</section>



<section class="section news-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="news-post">
                    <div class="row" style="background: #f2f2f24a;">
                        <div class="col-sm-6">
                            <? echo Breadcrumbs::widget([
                                'homeLink' => ['label' => 'Главная', 'url' => '/'],
                                'links' => [
                                    [
                                        'label' => ' ',
                                        'url' => ['/'],

                                    ],
                                ]]);
                            ?>

                        </div>
                        <div class="col-sm-6 sort">
                            <?php
                            $sortoptions = [ '0' => 'Дате, от нового до старого',
                                        '1' => 'Дате, от старого до нового',
                                        '2' => 'Названию поста, от А до Я',
                                        '3' => 'Названию поста, от Я до А',
                                        '5' => 'Просмотрам, по убыванию',
                                        '4' => 'Просмотрам, по возрастанию'];

                            ?>
                            <p><strong style="font-size:15px;font-weight: normal;color:#000">Сортировка по:</strong>
                            <form action="/" method="get" style="display: inline-block;">
                                        <select name="str" onchange="this.form.submit()" class="form-control" style="font-size: 14px!important;">
                                            <?php foreach ($sortoptions as $key=>$value):?>
                                                <option value="<?= $key ?>"
                                                    <?php if($key == $sortform){
                                                        echo ' selected';
                                                    } ?>>
                                                    <?= $value ?></option>
                                            <?php endforeach; ?>
                                </select>
                            </form>
                            </p>


                        </div>
                    </div>

                    <h1 style="padding: 4px 4px 15px 4px;color: #444;font-size: 2em;">Новости</h1>
                    <?php foreach ($articles as $article):?>

                        <div class="single-post">
                            <div class="image-wrapper">
                                <div class="post-thumb">
                                    <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"><img
                                                src="<?= $article->getImage(); ?>" alt=""></a>
                                    <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"
                                       class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">Подробнее</div>
                                    </a>
                                </div>
                            </div>
                            <div class="icons" style="margin: 10px 8px 10px;">
                                <div class="left-area">
                                    <p class="date"><em><?= $article->getDate(); ?> в <?= $article->getTime(); ?></em>
                                    </p>
                                </div>
                                <ul class="right-area social-icons">
                                    <li><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]) ?>"><i class="ion-ios-paper"></i><?= $article->category->title; ?></a></li>
                                    <li><a href="<?= Url::toRoute(['site/author', 'id' => $article->author->id]) ?>"><i class="ion-ios-person"></i><?= $article->author->name ?></a></li>
                                    <li class="numbers"></br ></li>
                                    <li class="number"><a href="<?= Url::toRoute(['site/view', 'id' => $article->id, '#' => 'engoy']); ?>"><i class="ion-ios-thumbs-up"></i><?= $article->engoy ?></a></li>
                                    <li class="number"><a href="<?= Url::toRoute(['site/view', 'id' => $article->id, '#' => 'commet']); ?>"><i class="ion-ios-chatbubbles"></i><?= $article->comments ?></a>
                                    </li>
                                    <li class="number"><a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"><i class="ion-ios-eye"></i><?= $article->viewed ?></a></li>
                                </ul>
                            </div>
                                <h3 class="title" style="margin-left: 8px;"><a
                                        href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"><b
                                            class="light-color" style="margin-left: 7px;"><?= $article->title ?></b></a></h3>
                            <div class="col-md-12"  style="">
                               <?= $article->description ?>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                  <a class="btn category-btn" style=" margin: 10px; border-radius:5px;padding: 8px 16px;"
                                     href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"><b>Читать полностью</b></a>
                              </div>
                                <div class="col-md-6"></div>

                            </div>


                        </div>
                    <?php endforeach; ?>
                    <?php

                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]);
                    ?>




                </div>
            </div>

            <?= $this->render('/partial/sidebar', [
                'popular' => $popular,
                'categories' => $categories,
                'tags' => $tags,
            ]); ?>


        </div>
    </div>
</section>
