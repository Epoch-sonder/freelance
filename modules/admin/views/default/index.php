<? use yii\helpers\Url; ?>
<style>

  .btn{ display:block; padding: 15px 30px; border-radius: 1px; letter-spacing: 2px;
  	border: 1px solid #0f4c81; background: #0f4c81; color: #fff; margin-bottom: 16px;margin-top: 6px; border-radius: 10px;}
  .btn:hover{ color: #0f4c81; background: none; }

  @media only screen and (max-width:800px) {
  	.btn-23{      display: inline-block;text-align: center;}
    .adminind{width: 0px;}  }
  @media only screen and (max-width: 479px) {
      .non{
          display: none;
      }
  }

</style>


<div class="admin-default-index">
    <div class="col-md-12 adminind">
        <div class="col-md-12">

            <a class="btn category-btn btn-23" style="" href="<?= Url::toRoute(['/admin/article/index',])?>"><b>Создание Статей</b></a>
        </div>
        <br class="non">
        <br class="non">
        <br class="non">
        <br class="non">
      <div class="col-md-6 ">
        <a class="btn category-btn btn-23" style="" href="<?= Url::toRoute(['/admin/category/index',])?>"><b>Создание Категори</b></a>
        <a class="btn category-btn btn-23" style="" href="<?= Url::toRoute(['/admin/tag/index',])?>"><b>Создание Тэгов</b></a>
      </div>
      <div class="col-md-6">
        <a class="btn category-btn btn-23" style="" href="<?= Url::toRoute(['/admin/slider/index',])?>"><b>Настройка Cлайдера</b></a>
        <a class="btn category-btn btn-23" style="" href="<?= Url::toRoute(['/admin/comment/index',])?>"><b>Проверка Комментариев</b></a>
      </div>
    </div>
  </div>
