<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
use yii\helpers\Html;
$this->title = 'Все категории';
?>

<div style="margin-top: 80px;"><p> </p></div>






<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <? echo Breadcrumbs::widget(['homeLink' => ['label' => 'Главная', 'url' => '/'], 'links' => [ [
                    'label' => 'Категории',
                    'url' => ['site/categoryall'],
                    'template' => "<li><b>{link}</b></li>\n", // template for this link only
                ],],]);?>
                <h1 style="padding: 4px 4px 15px 4px;color: #444;font-size: 2em;">Все категории</h1>
                <?php foreach($categorii as $categor):?>
                    <article class="post post-list">
                        <div class="row">

                            <div class="col-md-6" style="">
                                <div class="post-thumb" style="height:100%;padding-left: 5px;">
                                    <a href="<?= Url::toRoute(['site/category','id'=>$categor->id]);?>"><img style="max-width: 400px; height: 200px;" src="<?= $categor->getImage();?>" alt="" class="pull-left"></a>
                                </div>

                            </div>



                            <div class="col-md-5" style="display: grid;">

                                      <div class="col-md-12">
                                          <h2 style="padding-left: 3px;padding-top: 11px;font-size: 1.6em;" class="entry-title"><a href="<?= Url::toRoute(['site/category','id'=>$categor->id]);?>"><?=$categor->title?></a></h2>
                                      </div>
                                      <div class="col-md-12 " style="width: 100%;text-align: left; margin-bottom: 5px;">
                                          <a class="btn read-more-btn" style="margin-top: 50px;margin-right:15px;margin-bottom: 5px; padding: 8px 16px;border-radius:5px;" href="<?= Url::toRoute(['site/category','id'=>$categor->id]);?>"><b>Все новости данной категории</b></a>
                                      </div>

                            </div>

                    </article>
                <?php endforeach;?>
                <?php

                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>


            <div class="col-lg-4 col-md-12">
                <div class="sidebar-area" style="margin-top: 70px;" >
                    <div class="sidebar-section latest-post-area">
                        <h4 class="title"><b class="light-color">Популярные посты</b></h4>

                        <?php foreach ($popular as $article): ?>

                            <div class="latest-post" href="#">
                                <div class="l-post-image"><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><img src="<?= $article->getImage(); ?>" alt="Category Image"></a></div>
                                <div class="post-info">
                                    <h5><a style=" line-height: 1; font-size: 12pt;" href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><b class="light-color"><?= $article->title; ?></b></a></h5>
                                    <a class="btnn"  href="<?= Url::toRoute(['site/category','id'=>$article->category->id]);?>"><?= $article->category->title; ?></a>
                                    <h6 class="date"><em><?= $article->getDate();  ?></em></h6>
                                </div>
                            </div>

                        <?php endforeach;?>
                    </div>


                    <div class="sidebar-section tags-area">
                        <h4 class="title"><b class="light-color">Тэги</b></h4>
                        <ul class="tags">
                            <?php foreach($tags as $tag):?>
                                <li><a   class="tagssingle" href="<?= Url::toRoute(['site/tag', 'id'=>$tag->id]);?>"> <?= $tag->title ?></a></li>
                            <? endforeach;?>
                        </ul>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
