<?php use yii\helpers\Url; ?>

<div class="col-lg-4 col-md-12">
    <div class="sidebar-area" style="margin-top: 50px;">


        <div class="sidebar-section category-area">
            <h4 class="title"><b class="light-color"> <a href="<?= Url::toRoute(['site/categoryall']);?>">Категории</a></b></h4>



            <?php foreach($categories as $category):?>
                <a class="category" href="<?= Url::toRoute(['site/category','id'=>$category->id]);?>">
                    <img src="<?= $category->getImage();?>"  style="max-height:180px;" alt="Category Image">
                    <h6 class="name" ><?= $category->title;?>
                        <span class="post-count pull-right"> (<?= $category->getArticalesCount(); ?>)</span>
                    </h6>
                </a>
            <?php endforeach;?>

        </div>

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
