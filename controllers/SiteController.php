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
use mPDF;

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

    public function actionSamplepdf() {
        $attraction= [
            ['name' => 'The Hong Kong Polytechnic University', 'content' => 'PolyU\'s main campus has over 20 buildings, many of which are inter-connected. Apart from those named after donors, the buildings are identified in English letters (from block A to Z, without blocks K, O and I). In addition to classrooms, laboratories and other academic facilities, the university provides student hostels, a multi-purpose auditorium, sports, recreational and catering facilities, as well as a bookstore and banks.'],
            ['name' => 'Hong Kong Science Museum', 'content' => 'The science-themed museum hand-on, with over 500 interactive exhibits ranging over a variety of topics such as robotics and virtual reality. Through presenting quality exhibitions and fun science programmes in an enjoyable environment, the Museum serves to popularize science to the public and support science education in schools.'],
            ['name' => 'Hong Kong Space Museum', 'content' => 'It is a museum of astronomy and space science in Tsim Sha Tsui. The museum has two wings: east wing and west wing. The former consists of the nucleus of the museum\'s planetarium, which has an egg-shaped dome structure. Beneath it are the Stanley Ho Space Theatre, the Hall of Space Science, workshops and offices. The west wing houses the Hall of Astronomy, the Lecture Hall, a gift shop and offices.'],
            ['name' => 'Avenue of Stars', 'content' => 'Entering from Salisbury Garden, a 4.5-metre-tall replica of the statuette given to winners at the Hong Kong Film Awards greets visitors. Along the 440-metre promenade, the story of Hong Kong\'s one hundred years of cinematic history is told through inscriptions printed on nine red pillars. Set into the promenade are plaques honouring the celebrities.'],
            ['name' => 'iSQUARE', 'content' => 'iSQUARE is the first one-stop shopping and entertainment complex linked to Tsim Sha Tsui MTR station. There are Watches & Jewelry, Fashion & Accessories, Beauty & Health, Lifestyle & Entertainment, and Supermarket & Department Store located at the shopping podium. Besides, there is the cinema box — a highlight not to be missed, which houses a total of 5 grand cineplexes, including IMAX Digital Theatre. What’s more, iSQUARE also features multi-national fine-dining restaurants at its iconic tower, bringing customers not only an unparalleled dining experience, but also a mesmerizing view of the Victoria Harbour!'],
            ['name' => 'Harbour City', 'content' => 'Harbour City is a one-stop shopping paradise with over 450 shops, 50 food & beverage outlets, two cinemas, three hotels, 10 office buildings, two serviced apartments and a luxurious private club all under one roof. With the “Star” Ferry pier, its home to cruise liner berths, maritime history and fabulous harbour view – all at its doorstep. It is easy to see where the mall drew the inspiration for its name.'],

        ];
        $output_pdf= '<h1>Nearby attraction</h1>';
        $output_pdf.= '<table width = 100%>';

        $num = 1;
        foreach($attraction as $row){
            $path = "http://localhost/comp3421/web/index.php?r=site%2Ftravel_{$num}";
            $src = "/comp3421/web/../resources/travel/travel_{$num}.jpg";
            $output_pdf.= '<tr><td>';
            $output_pdf.= '<a  href="'.$path.'"><img alt="'.$row['name'].'" title="'.$row['name'].'" width="250" height="147" src="'.$src.'" border="0" /></a>';
            $output_pdf.= '</td>';
            if($num%2 == 1)
                $output_pdf.= '<td class = "green">';
            else
                $output_pdf.= '<td>';
            $output_pdf.= '<a  href="<?= $path ?>">"'.$row['name'].'"</a>';
            $output_pdf.= '<br>"'.$row['content'].'"<br>';
            $output_pdf.= '</td></tr>';
            $num++;
        }
        $output_pdf.= "</table>";

        $mpdf = new mPDF;
        $mpdf->WriteHTML("$output_pdf");
        $mpdf->Output();

        exit;
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
