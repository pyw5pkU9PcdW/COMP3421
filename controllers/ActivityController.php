<?php

namespace app\controllers;

use Yii;
use app\models\Activity;
use app\models\ActivitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\helpers\Html;
use mPDF;

/**
 * ActivityController implements the CRUD actions for Activity model.
 */
class ActivityController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Activity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $schedule = Activity::getAllActivities();

        $searchModel = new ActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        /*$dataProvider = new ActiveDataProvider([
            'query' => Activity::find(),
        ]);*/

        return $this->render('index', [
            'dataProvider' => $dataProvider, 'schedule' => $schedule, 'searchModel' => $searchModel,
        ]);

    }

    /**
     * Displays a single Activity model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    public function actionSamplepdf($id) {
        $model = $this->findModel($id);
        $imgLink = "../resources/activities/activity_".$id.".jpg";
        $date = date("M d D", strtotime($model->startDatetime));
        $startTime = date("g:i A", strtotime($model->startDatetime));
        $endTime = date("g:i A", strtotime($model->endDatetime));
        $content = '
        <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1>'.$model->Activity_name.'</h1>
        <p>'.$model->description.'</p>
        <p class="text-center"><img src="'.$imgLink.'" class="activity-detail-img"></p>
        </div>
        <div class="col-sm-4 activity-detail-technical" style="background-color: <?= \app\models\ActivityType::getActivityTypeThemeColorById($model->ActivityType_id) ?>">
            <h3>Date and Time</h3>
            '.$date.'<br>
            '.$startTime.' - '.$endTime.'
            <h3>Venue</h3>
            '.\app\models\Venue::getVenueNameById($model->Venue_id).'
            <h3>Person in Charge</h3>
            '.\app\models\User::getUserFullNameById($model->personInCharge).'

        </div>
        </div>
        </div>
        ';

        $mpdf = new mPDF;
        $mpdf->WriteHTML($content);
        $mpdf->Output();

        exit;
    }


    /**
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        if(Yii::$app->user->can('activityCreate')) {
            $model = new Activity();
            if ($model->load(Yii::$app->request->post())) {
                $model->lastModifyTime = date("Y-m-d H:i:s");
                $model->Administrator_id = Yii::$app->user->id;
                if($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            return $this->render('create', [
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

    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        if(Yii::$app->user->can('activityUpdate')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
                $model->lastModifyTime = date("Y-m-d H:i:s");
                $model->Administrator_id = Yii::$app->user->id;
                if($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            return $this->render('update', [
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

    /**
     * Deletes an existing Activity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('activityDelete')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            if(Yii::$app->user->isGuest) {
                Yii::$app->user->loginRequired();
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }
        }
    }

    /**
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if ($model = Activity::find()->where(['id'=>$id])->all()[0]) {
        //if ($model = Activity::find($id)->one()) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
