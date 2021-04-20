<?php

use app\models\Article;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
$this->title = 'Статья: '. $article->title;
?>
<div style="margin-top: 80px;"><p> </p></div>
<style>
    .like{
        cursor:pointer;
        width:128px;
        height:128px;
        margin:10px auto 40px;
        position:relative;
    }
    .like:hover.active, .like{
        background: url('../images/like.png') no-repeat;
    }
    .like.active, .like:hover{
        background: url('../images/like_active.png') no-repeat;
    }
    .like .counter{
        border: 5px solid #333333;
        bottom: -37px;
        color: #333333;
        font-size: 31px;
        left: 27px;
        position: absolute;
        text-align: center;
        width: 64px;
    }

    .ya-share2__badge{
        border-radius: 5px!important;
    }


</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v7.0"></script>

<section class="news-area" style="padding: 0px 0px 0px 0px;">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="news-post">


                    <div class="single-post" style="background: #fff;" >

                        <?
                        $i = 0;
                            {
                                if ($i === 0) {
                                    echo Breadcrumbs::widget([
                                        'homeLink' => ['label' => 'Главная', 'url' => '/'],
                                        'links' => [
                                            [
                                                'label' => $article->category->title ,
                                                'url' => ['site/category', 'id' => $article->category->id],

                                            ],
                                            [
                                                'label' => $article->title ,
                                                'url' => ['site/view', 'id' => $article->id],
                                                'template' => "<li><b>{link}</b></li>\n", // template for this link only
                                            ],
                                        ],
                                    ]);
                                    ++$i;
                                }}
                        ?>

                        <div class="image-wrapper"><img src="<?= $article->getImage();?>">
                        </div>
                         <div class="icons">
                            <div class="left-area">
                                <p class="date" ><em><?= $article->getDate(); ?> в <?= $article->getTime();?></em></p>
                                </div>

                            <ul class="right-area social-icons">
                                <li style="margin-top: 5px"><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]) ?>"><i class="ion-ios-paper"></i><?= $article->category->title; ?></a></li>
                                <li style="margin-top: 5px"><a href="<?= Url::toRoute(['site/author', 'id' => $article->author->id]) ?>"><i class="ion-ios-person"></i><?= $article->author->name ?></a></li>
                                <li class="numbers"></br ></li>
                                <li class="number" style="margin-top: 5px"><a href="#"><i class="ion-md-clock"></i><?= $article->readtime ?> мин.</a></li>
                                <li class="number" style="margin-top: 5px"><a href="#"><i class="ion-ios-chatbubbles"></i><?php echo $sumcom?></a></li>
                                <li class="number" style="margin-top: 5px"><a href="#"><i class="ion-ios-eye"></i> <?php echo $sumviewed ?></a></li>
                            </ul>
                        </div>

                        <div class="col-md-12 cen">
                        <h3 class="title" style="font-size: 16pt;"><b class="light-color"><?= $article->title ?></b></h3>
                        </div?


                        <div class="col-md-12">
                            <?= $article->content ?>
                        </div>



                        <div class="decoration">
                            <?php foreach($article->tags as $tag):?>
                                <li style="margin-top: 15px;     margin-right: 5px;" class="tagssingle"><a class="" href="<?= Url::toRoute(['site/tag', 'id'=>$tag->id]);?>"> #<?= $tag->title ?></a></li>
                            <? endforeach;?>
                        </div>


                    </div>


                    <div class="col-md-12">

                        <p style="display: inline-block;">Понравилась статья?</p>


                        <a href="#" class="btn btn-primary button-like" style="padding: 4px;  border-radius: 8px; <?php echo $islike ? 'display: none' : ''; ?> "  data-id="<?php echo $article->id; ?>">
                            Мне нравится&nbsp;&nbsp;<span class="ion-md-thumbs-up"></span>
                        </a>


                        <a href="#" class="btn read-more-btn button-unlike" style="padding: 4px; border-radius: 8px; <?php echo !$islikes ? ''  : 'display:none' ; ?>"  data-id="<?php echo $article->id; ?>">
                            Мне нравится&nbsp;&nbsp;<span class="ion-md-thumbs-up"></span>
                        </a>
                        <span class="likes-count" style="color: #4285f4;" id="engoy"><?php echo $sumlike ?></span>

                    </div>

                    <div class="col-md-12" >

                    <div style="max-height:30px;    margin-top: 10px; ">
                        <p style="display: inline-block; vertical-align: sub;">Поделиться: </p>
                        <script src="https://yastatic.net/share2/share.js"></script>
                        <div style="display: inline-block;" class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,twitter,whatsapp,telegram"></div>
                    </div>

                    </div>


                    <div class="col-md-12" style="margin-top: 30px; margin-bottom: 20px" id="commet">
                        <p><?php echo $sumcom;
                            if( $sumcom == 0 or $sumcom > 4 )
                            { echo " Коментариев";}  if($sumcom == 1){ echo " Коментарий";}
                            if($sumcom > 1 && $sumcom < 5)
                            { echo " Коментария";}; ?></p>
                    </div>

                    <div class="comments-area"  >




                        <?= $this->render('/partial/comment', [
                            'article'=>$article,
                            'comments'=>$comments,
                            'commentForm'=>$commentForm,
                        ])?>

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

<?php $this->registerJsFile('@web/public/js/likes.js',[
        'depends' =>  \yii\web\JqueryAsset::className(),
]) ?>
