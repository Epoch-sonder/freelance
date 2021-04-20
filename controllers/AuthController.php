<?php


namespace app\controllers;


use app\models\ContactForm;
use app\models\LoginForm;
use app\models\SignupForm;
use yii\web\Controller;
use Yii;
use yii\web\Response;
use app\models\User;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */

    public function actionSignup()
    {
        $model = new SignupForm();
        $mod = new ContactForm();
        if ($mod->load(Yii::$app->request->post()) && $mod->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            $model->password = Yii::$app->security->generatePasswordHash($model->password);
            if($model->signup())
            {
                return $this->redirect(['auth/login']);
            }
        }

        return $this->render('signup', [
            'model'=>$model,
            'mod' => $mod,
        ]);
    }

    public function actionLoginVk($uid, $first_name, $photo)
    {
        $user = new User();
        if($user->saveFromVk($uid, $first_name, $photo))
        {
            return $this->goBack();
        }
    }

    public function actionTest()
    {
        $user = User::findOne(1);

        Yii::$app->user->logout();

        if(Yii::$app->user->isGuest)
        {
            echo 'Пользователь гость';
        }
        else
        {
            echo 'Пользователь Авторизован';
        }

    }

}