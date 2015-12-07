<?php

namespace app\controllers;

use app\models\Activity;
use app\models\Post;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\ForbiddenHttpException;

class SiteController extends Controller
{
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

    public function actionIndex() {
        if(Yii::$app->user->isGuest) {
            return $this->render('index');
        } else {
            $mySchedule = Activity::getJoinActivity();
            $newPost = new Post();
            return $this->render('myindex', [
                'schedule' => $mySchedule, 'newPost' => $newPost
            ]);
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        if(Yii::$app->user->can('siteContact')) {
            $model = new ContactForm();
            if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('contactFormSubmitted');

                return $this->refresh();
            }
            return $this->render('contact', [
                'model' => $model,
            ]);
        } else {
            if(Yii::$app->user->isGuest) {
                Yii::$app->user->loginRequired();
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }
        }
    }

    public function actionTravel() {
        return $this->render('travel');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTravel_1()
    {
        return $this->render('travel_1');
    }

    public function actionTravel_2()
    {
        return $this->render('travel_2');
    }

    public function actionTravel_3()
    {
        return $this->render('travel_3');
    }

    public function actionTravel_4()
    {
        return $this->render('travel_4');
    }

    public function actionTravel_5()
    {
        return $this->render('travel_5');
    }

    public function actionTravel_6()
    {
        return $this->render('travel_6');
    }
}
