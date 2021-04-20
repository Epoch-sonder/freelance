<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;


class Revise extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'revise';
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

    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    public static function getAll()
    {
        return Revise::find()->all();
    }

    public function saveRevise()
    {

            $revis = Revise::findall(['article_id'=>$this->id]);
            $art_revis= $revis->article_id;
            $ip_revis= $revis->ip;
            $ip = Yii::$app->request->userIP;
            var_dump($revis);
//            if($ip  ){
//
//            }
        $artd = new Revise;
        $artd->article_id = $id;
        $artd->ip = $ip;
        return $artd->save(false);




    }
    public function viewedCounter(){
        $ip = Yii::$app->request->userIP;

        return $this->save(false);

        }
    }



