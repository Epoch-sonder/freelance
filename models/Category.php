<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $title
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
             ['image', 'default', 'value' => 0]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
        ];
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';

    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function getArticales()
    {
        return $this->hasMany(Article::className(), ['category_id' => 'id']);
    }

    public function getArticalesCount(){
        return $this->getArticales()->count();
    }

    public static function getAll()
    {
        return Category::find()->limit(4)->all();
    }
    public static function getAll_all()
    {

        $query = Category::find();
        $pagination = new Pagination(['totalCount' => $query->count(),'pageSize'=>5]);
        $categorii = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['categorii'] = $categorii;
        $data['pagination'] = $pagination;

        return $data;

    }
    public static function getArticlesByCategory($id)
    {
        // build a DB query to get all articles with status = 1
        $query = Article::find()->where(['category_id'=>$id]);

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>4]);

        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }
}
