<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleTag;
use app\models\Category;
use app\models\Comment;
use app\models\CommentForm;
use app\models\Like;
use app\models\Revise;
use app\models\Slider;
use app\models\Tag;
use app\models\User;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SortForm;
use function JmesPath\search;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function init()
    {
        $this->on('beforeAction', function ($event) {

            // запоминаем страницу неавторизованного пользователя, чтобы потом отредиректить его обратно с помощью  goBack()
            if (Yii::$app->getUser()->isGuest) {
                $request = Yii::$app->getRequest();
                // исключаем страницу авторизации или ajax-запросы
                if (!($request->getIsAjax() || strpos($request->getUrl(), 'login') !== false)) {
                    Yii::$app->getUser()->setReturnUrl($request->getUrl());
                }
            }
        });
    }
    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()
    {
        $data = Article::getAll();
        $slider = Slider::find()->all();
        $popular = Article::getPopular();
        $categories = Category::getAll();
        $tags = Tag::getAll();
        $model = new SortForm();
        $str = null;
        $sortform= Yii::$app->request->get('str');
        if(isset($sortform)){
            switch ($sortform){
                case 0:
                    $data = Article::getAll(['date'=> SORT_DESC,'time'=>SORT_DESC]);
                    break;
                case 1:
                    $data = Article::getAll(['date'=> SORT_ASC,'time'=>SORT_ASC]);
                    break;
                case 2:
                    $data = Article::getAll(['title'=>SORT_DESC]);
                    break;
                case 3:
                    $data = Article::getAll(['title'=>SORT_ASC]);
                    break;
                case 4:
                    $data = Article::getAll(['viewed'=>SORT_ASC]);
                    break;
                case 5:
                    $data = Article::getAll(['viewed'=> SORT_DESC]);
                    break;
                default:
                    $data = Article::getAll(['date'=> SORT_DESC,'time'=>SORT_DESC]);
                    break;
            }
        }
        else{
            $data = Article::getAll(['date'=> SORT_DESC,'time'=>SORT_DESC]);
        }


        return $this->render('index' ,[
            'slider'=>$slider,
            'sortform'=>$sortform,
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=> $popular,
            'categories'=>$categories,
            'tags'=>$tags,
            'model'=>$model,
        ]);


    }

    public function actionView($id)
    {
        $article = Article::findOne($id);
        $popular = Article::getPopular();
        $categories = Category::getAll();
        $tags = Tag::getAll();
        $comments = $article->getArticleComments();
        $commentForm = new CommentForm();
        $ip = Yii::$app->request->userIP;
        $isviewed = Revise::find()->where(['ip'=>$ip,'article_id'=>$id])->exists();
        $islikes = Revise::find()->where(['ip'=>$ip,'article_id'=>$id]);
        if($isviewed){
       }
        else{
            $artd = new Revise;
            $artd->article_id = $id;
            $artd->ip = $ip;
            $artd->save(false);
        }
        $sumlike = Like::find()->where(['article_id'=>$id])->count();
        $sumviewed = Revise::find()->where(['article_id'=>$id])->count();
        $sumcom = Comment::find()->where(['article_id' => $id,'status'=>1])->count();
        $article->engoy = (int)$sumlike;
        $article->viewed = (int)$sumviewed;
        $article->comments = (int)$sumcom;
        $article->save(false);
        return $this->render('single',[
            'islikes'=>$islikes,
            'sumlike'=>$sumlike,
            'sumviewed'=>$sumviewed,
            'isviewed'=>$isviewed,
            'article'=> $article,
            'popular'=> $popular,
            'categories'=>$categories,
            'tags'=>$tags,
            'comments'=>$comments,
            'commentForm'=>$commentForm,
            'sumcom'=>$sumcom,
            ]);
    }

    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $query = Article::find()
            ->orFilterWhere(['like','title', $q])
            ->orFilterWhere(['like','description',$q])
            ->orFilterWhere(['like','content',$q]);
        $count = $query->count();
        $paginat = new Pagination(['totalCount' => $count, 'pageSize'=>4]);
        $articl = $query->offset($paginat->offset)
            ->limit($paginat->limit)
            ->all();
        $popular = Article::getPopular();
        $categories = Category::getAll();
        $tags = Tag::getAll();
        return $this->render('q', compact('articl', 'paginat', 'q','popular','categories','tags'));
    }

    public function actionCategory($id)
    {
        $data = Category::getArticlesByCategory($id);

        $popular = Article::getPopular();
        $categories = Category::getAll();
        $tags = Tag::getAll();

        return $this->render('category',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],

            'popular'=> $popular,
            'categories'=>$categories,
            'tags'=>$tags,
        ]);

        // получаем название категории
//        $request = Yii::$app->request->get('title');
        // выполяем запрос к таблице категории и выбираем конкретную категорию организаций в которую мы зашли
//        $compcatname =Category::find()->where(['alias' => $reguest])->one();
        // отправляем наши данные в представление 'category' с массивом данных по этой категории
//        return $this->render('category', ['compcatname' => $compcatname]);
    }
    public function actionCategoryall()
    {
        $data = Category::getAll_all();
        $popular = Article::getPopular();
        $tags = Tag::getAll();

        return $this->render('categoryall',[
            'categorii'=>$data['categorii'],
            'pagination'=>$data['pagination'],
            'popular'=> $popular,
            'tags'=>$tags,
        ]);

    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionAuthor($id)
    {
        $data = User::getArticlesByAuthors($id);
        $aurhor=User::findOne($id);

        $popular = Article::getPopular();
        $categories = Category::getAll();
        $tags = Tag::getAll();

        return $this->render('author',[
            'aurhor'=> $aurhor,
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],

            'popular'=> $popular,
            'categories'=>$categories,
            'tags'=>$tags,
        ]);
    }


    public function actionTag($id)
    {

        $data = Tag::getArticlesByTag($id);
        $tag=Tag::findone($id)->getTagArticles()->with('article')->with('tag')->all();
        $popular = Article::getPopular();
        $categories = Category::getAll();
        $tags = Tag::getAll();

        return $this->render('tag',[
            'tag'=>$tag,
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=> $popular,
            'categories'=>$categories,
            'tags'=>$tags,
        ]);



    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about', [
        ]);
    }

    public function actionSumcomm($id)
    {
        $customer = new Article();
        $customer->viewed = '$sumcom';
        $customer->save();
    }

    public function actionComment($id)
    {
        $model= new CommentForm();
        if (Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if ($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment','Ваш комментарий опубликуют после проверки модератором');
                return $this->redirect(['site/view','id'=>$id]);
            }
        }
    }

    public function actionLike(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $ip = Yii::$app->request->userIP;
        $id = Yii::$app->request->post('id');
        $islike = Like::find()->where(['ip'=>$ip,'article_id'=>$id])->exists();
        if($islike) {}
        else{
            $like = new Like;
            $like->article_id = $id;
            $like->ip = $ip;
            $like->save(false);
        }
        return[
            'success'=> true,
            'likesCount'=> (int)Like::find()->where(['article_id'=>$id])->count(),
        ];
    }
    public function actionUnlike(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $ip = Yii::$app->request->userIP;
        $id = Yii::$app->request->post('id');
        $isunlike = Like::find()->where(['ip'=>$ip,'article_id'=>$id])->exists();
        if($isunlike) {
            $unlike = like::find()->where(['ip'=>$ip,'article_id'=>$id])->one();
            $unlike->delete(false);
        }
        return[
            'success'=> true,
            'likesCount'=> (int)Like::find()->where(['article_id'=>$id])->count()
        ];
    }



    private function selectListProd($field_sort = ['date'=>SORT_DESC]){
        $query = Article::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>4]);
        $articles = $query->offset($pagination->offset)
            ->orderBy($field_sort)
            ->limit($pagination->limit)
            ->all();
    }


}
