<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создание статьи', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions' => [
            'style' => 'width:1000px;'
        ],
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width:80px;'],],


            'id',
            'title',
            [
                'format'=> 'html',
                'label'=>'Фотография',
                'value'=> function($data){
                    return Html::img($data->getImage(), ['width'=>200]);
                }
            ],
            'date',
            'time',
            'viewed',
            'engoy',
            'comments',
//          'description:ntext',
//            'content:ntext',


            //'image',

            //'status',
            //'category_id',


        ],
    ]); ?>


</div>
