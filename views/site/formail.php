<?php
use yii\helpers\Url;


?>

<div style="  margin-top: 80px;"><p> </p></div>

<style>



</style>




<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <h1 style="padding: 4px 4px 15px 4px;color: #444;font-size: 2em;">Категория: <?php echo $article->category->title ?> </h1>
                <?php foreach($articles as $article):?>
                    <article class="post post-list" style="">
                        <div class="row" style="">

                            <div class="col-md-6" style="" >
                                <div style="width:100%; height:40px;"><p > </p></div>
                                <div class="post-thumb" style="">
                                  <a style=""href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>"><img src="<?= $article->getImage();?>" alt="" class="pull-left"></a>
                                  <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">Подробнее</div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6" style="">
                                <div class="post-content">
                                    <div class="entry-header ">
                                        <h1 style="line-height: 0px;     padding-bottom: 10px;" class="entry-title"><a  href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>"><?=$article->title?></a></h1>
                                        <ul>
                                        <li><h6 ><a href="<?= Url::toRoute(['site/author', 'id' => $article->author->id]) ?>" style="font-size: 13px;font-weight: 400; line-height: 2;"><i class="ion-ios-person"></i><?= $article->author->name ?></a></h6></li>
                                        </ul>
                                            <h6><?= $article->getDate();?></h6>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <p ><? $string=$article->description;$string = substr($string, 0, 207); echo $string."… ";?></p>
                                </div>
                                <div style="width: 100%;text-align: right;">
                                    <a class="btn read-more-btn" style="margin-left: 135px;margin-bottom: 5px;" href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><b>Подробнее</b></a>
                                </div>
                            </div>

                        </div>
                    </article>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<!-- end main content-->
