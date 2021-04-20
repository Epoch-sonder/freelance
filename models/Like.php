<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;


class Like extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'like';
    }

    public function rules()
    {
        return [
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'ip' => 'Ip',
        ];
    }
    public function getId(){
        return $this->ip;
    }

    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    public static function getAll()
    {
        return Like::find()->all();
    }

}



