<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;


$this->title = 'Категория'.' '. $articles[0]->category->title  ;
?>

<div style="  margin-top: 80px;"><p> </p></div>

<style>



</style>


<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <? $i = 0;
                foreach ($articles as $article) { if ($i === 0) { echo Breadcrumbs::widget(['homeLink' => ['label' => 'Главная', 'url' => '/'], 'links' => [ [
                                    'label' => $article->category->title ,
                                    'url' => ['site/category', 'id' => $article->category->id],
                                    'template' => "<li><b>{link}</b></li>\n", // template for this link only
                                ],],]);++$i;}}  ;?>
                <? $categor = $article->category->title?>
                <h1 style="padding: 4px 4px 15px 4px;color: #444;font-size: 2em;">Категория: <?php echo $article->category->title ?> </h1>
                <?php if(!empty($articles)):?>
                <?php foreach($articles as $article):?>
                    <article class="post post-list" style="border-radius: 21px;">
                        <div class="row" style="">
                            <div class="col-md-6" style="" >
                                <div style="width:100%; height:30px;"><p > </p></div>
                                <div class="post-thumb"  style="margin-left: 15px;">
                                  <a style=""href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>"><img src="<?= $article->getImage();?>" alt="" class="pull-left"></a>
                                  <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">Подробнее</div>
                                    </a>
                                </div>
                                <div style="width:100%; height:30px;"><p > </p></div>
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
                                    <p>
                                    <?
                                    $string = $article->description;
                                    $string = mb_substr($string, 0, 207,'UTF-8');
                                    $position = mb_strrpos($string, ' ', 'UTF-8');
                                    $string = mb_substr($string, 0 , $position,'UTF-8');
                                    echo $string."...";
                                    ?></p>
                                </div>
                                <div style="width: 100%;text-align: left;">
                                    <a class="btn read-more-btn" style="margin-top: 10px;margin-right:15px;margin-bottom: 5px; padding: 8px 16px;border-radius:5px;" href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><b>Читать полностью</b></a>
                                </div>
                            </div>

                        </div>
                    </article>
                <?php endforeach;?>
                <?php else:?>
                <h5>Ничего не найдено...</h5>
                <?php endif;?>
                <?php
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>

            <?= $this->render('/partial/sidebar',[
                'popular'=> $popular,
                'categories'=>$categories,
                'tags'=>$tags,
            ]); ?>

        </div>
    </div>
</div>