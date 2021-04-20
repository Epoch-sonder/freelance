<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>

   .action-column{
       width:80px;
    }
</style>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать Категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
             'contentOptions' => ['style' => 'width:80px;'],
            ],

            'id',
            'title',
            [
                'format'=> 'html',
                'label'=>'image',
                'value'=> function($data){
                    return Html::img($data->getImage(), ['width'=>200]);
                }
            ],
            //'image',


        ],
    ]); ?>


</div>
