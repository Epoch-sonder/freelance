<?php
use yii\helpers\Url;
?>

<?php if(!empty($comments)):?>
    <?php foreach($comments as $comment):?>
        <div class="comment"><!--bottom comment-->
            <div class="author-image">
                <img src="<?= $comment->user->image; ?>" alt="Autohr Image">
            </div>

            <div class="comment-info">
                <h5><b class="light-color"><?= $comment->user->name;?></b></h5>
                <h6 class="date"><em><?= $comment->getDate();?>  в <?= $comment->getTime();?></em></h6>
                <p><?= $comment->text; ?></p>
            </div>
        </div>
    <?php endforeach;?>

<?php endif;?>

    </div>

<?php if(Yii::$app->user->isGuest):?>
    <p class="title" style="margin-bottom: 50px; margin-left: 15px">Чтобы оставить комментарий, необходимо <a class="ahre" href="<?= Url::toRoute(['auth/signup'])?>">
                зарегистрироваться</a> или <a  class="ahre" href="<?= Url::toRoute(['auth/login'])?>">войти</a></p>
    <?php else: ?>
    <div class="leave-comment-area" id="success" style="margin-left: 15px;">
        <h4 class="title"><b class="light-color" >Оставить свой коментарий</b></h4>
        <?php if(Yii::$app->session->getFlash('comment')):?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('comment'); ?>
            </div>
        <?php endif;?>
        <?php $form = \yii\widgets\ActiveForm::begin([
            'action'=>['site/comment', 'id'=>$article->id,'#' => 'success'],
            'options'=>[ 'role'=>'form']])?>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($commentForm, 'comment')->textarea(['style'=>'width: 100%; border-width: 0px 0px 1px;border-bottom-style: solid;border-bottom-color: rgb(170, 170, 170);margin-left: 0px; margin-top: 0px;margin-bottom: 0px;','class'=>'message-input','rows'=>'6','placeholder'=>'Введите свое сообщение'])->label(false)?>
            </div>
            <div class="col-sm-12">
                <button class="btn btn-2"><b>Оставить комментарий</b></button>
            </div>
        </div>
        <?php \yii\widgets\ActiveForm::end();?>
    </div>
<?php endif;?>
