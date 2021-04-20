
<?php

use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Поиск по запросу: '. $q;
?>


<style>
    .breadcrumb{
        background:  #f2f2f200;
        margin-bottom: 0px;
    }
    .sort p{
        margin-top: 5px;
        line-height: 1;
        font-size: .8em;
        display: inline-block;
    }
    .field-sortform-str{
        max-width: 70%;
        display: inline-block;
        margin-bottom: 0px;
        margin-top: 5px;
    }
    .form-control{
        margin-left: 5px;
        font-size: 0.8rem;
    }
    #w0{
        display: inline-block;
    }
    #sortform-str{
        padding: 2px 6px;
    }
</style>

<section class="section news-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="news-post">
                    <h1 style="padding:40px 4px 20px 4px;color: #444;font-size: 2em;">Поиск по запросу: <?= Html::encode($q) ?></h1>
                    <?php if(!empty($articl)):?>
                    <?php foreach ($articl as $article):?>

                    <div class="single-post">
                        <div class="image-wrapper">
                            <div class="post-thumb">
                                <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><img src="<?= $article->getImage();?>" alt=""></a>
                                <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">Подробнее</div>
                                </a>
                            </div>
                        </div>
                        <div class="icons" style="margin: 10px 8px 10px;">
                            <div class="left-area">
                                <p class="date"><em><?= $article->getDate(); ?> в <?= $article->getTime(); ?></em></p>
                                 </div>
                            <ul class="right-area social-icons">
                                <li><a href="<?= Url::toRoute(['site/author', 'id' => $article->author->id]) ?>"><i class="ion-ios-person"></i><?= $article->author->name ?></a></li>
                                <li><a href="#"><i class="ion-ios-thumbs-up"></i> <?= $article->viewed ?></a></li>
                                <li><a href="#"><i class="ion-ios-chatbubbles"></i><?= $article->comments ?></a></li>
                                <li><a href="#"><i class="ion-ios-eye"></i><?= $article->viewed ?></a></li>
                            </ul>
                        </div>
                        <a class="btn category-btn" style="margin-left: 8px;" href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>"><b><?=$article->category->title; ?></b></a>
                        <h3 class="title"   style="margin-left: 8px;"><a href= "<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><b class="light-color"><?= $article->title ?></b></a></h3>
                        <p style="margin-left: 8px;"><?= $article->description ?></p>
                        <a class="btn read-more-btn" style="margin-left: 10px; margin-bottom: 10px;" href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><b>Подробнее</b></a>

                    </div>

                    <?php endforeach; ?>
                    <?php

                    echo LinkPager::widget([
                        'pagination' => $paginat,
                    ]);
                    ?>

                    <?php else:?>
                    <h5>Ничего не найдено...</h5>
                    <?php endif;?>
                </div>
            </div>

            <?= $this->render('/partial/sidebar',[
                'popular'=> $popular,
                'categories'=>$categories,
                'tags'=>$tags,
            ]); ?>


        </div>
    </div>
</section>
