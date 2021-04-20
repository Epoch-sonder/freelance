<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $content
 * @property string|null $date
 * @property string|null $image
 * @property int|null $viewed
 * @property int|null $user_id
 * @property int|null $status
 * @property int|null $category_id
 *
 * @property ArticleTag[] $articleTags
 * @property Comment[] $comments
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'description','content','readtime'], 'string'],
            [['date'], 'date', 'format'=>'php:Y-m-d'],
            [['date'], 'default', 'value'=>date('Y-m-d')],
            [['time'], 'time', 'format'=>'php:H:i'],
            [['time'], 'default', 'value'=>date ('H:i')],
            [['title'], 'string', 'max'=> 255]];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'date' => 'Date',
            'time'=>'Time',
            'readtime'=>'Readtime',
            '?image' => 'Image',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
        ];
    }
    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getId()
    {
        return $this->id;

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


    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function saveCategory($category_id)
    {
        $category = Category::findOne($category_id);
        if($category != null)
        {
            $this->link('category',$category);
            return true;
        }

    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('article_tag', ['article_id' => 'id']);
    }

    public function getSelectedTags()
    {
        $selectedIds = $this->getTags()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selectedIds,'id');
    }

    public function saveTags($tags)
    {
        if (is_array($tags))
        {
            $this->clearCurrentTags();

            foreach ($tags as $tag_id)
            {
                $tag=Tag::findOne($tag_id);
                $this->link('tags',$tag);
            }
        }
    }

    public function clearCurrentTags()
    {
        ArticleTag::deleteAll(['article_id'=>$this->id]);
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date, 'php: d.m.Y');
    }
    public function getTime()
    {
        return Yii::$app->formatter->asTime($this->time, 'php: H:i');
    }

    public static function getAll($filed_sort= ['date'=> SORT_DESC,'time'=>SORT_DESC])
    {
        // build a DB query to get all articles with status = 1
        $query = Article::find();

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>4]);

        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->orderBy($filed_sort)
            ->limit($pagination->limit)
            ->all();
        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function getPopular()
    {
        return Article::find()->orderBy('viewed desc')->limit(4)->all();
    }

    public function saveArticle()
    {
        $this->user_id = Yii::$app->user->id;
        return $this->save();
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(),['article_id'=>'id']);
    }

    public function getArticleComments()
    {
        return $this->getComments()->where(['status'=>1])->all();
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }


    public function getTagArticles()
    {
        return $this->hasMany(ArticleTag::className(), ['article_id' => 'id']);
    }


}
