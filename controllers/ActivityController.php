<?php

namespace app\controllers;

use Yii;
use app\models\Activity;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $dataProvider = new ActiveDataProvider([
            'query' => Activity::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Activity model.
     * @param integer $id
     * @param integer $Venue_id
     * @param integer $Topic_id
     * @param integer $ActivityType_id
     * @param integer $Administrator_id
     * @param integer $Administrator_User_id
     * @param integer $Administrator_User_Participant_id
     * @return mixed
     */
    public function actionView($id, $Venue_id, $Topic_id, $ActivityType_id, $Administrator_id, $Administrator_User_id, $Administrator_User_Participant_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $Venue_id, $Topic_id, $ActivityType_id, $Administrator_id, $Administrator_User_id, $Administrator_User_Participant_id),
        ]);
    }

    /**
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Activity();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'Venue_id' => $model->Venue_id, 'Topic_id' => $model->Topic_id, 'ActivityType_id' => $model->ActivityType_id, 'Administrator_id' => $model->Administrator_id, 'Administrator_User_id' => $model->Administrator_User_id, 'Administrator_User_Participant_id' => $model->Administrator_User_Participant_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $Venue_id
     * @param integer $Topic_id
     * @param integer $ActivityType_id
     * @param integer $Administrator_id
     * @param integer $Administrator_User_id
     * @param integer $Administrator_User_Participant_id
     * @return mixed
     */
    public function actionUpdate($id, $Venue_id, $Topic_id, $ActivityType_id, $Administrator_id, $Administrator_User_id, $Administrator_User_Participant_id)
    {
        $model = $this->findModel($id, $Venue_id, $Topic_id, $ActivityType_id, $Administrator_id, $Administrator_User_id, $Administrator_User_Participant_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'Venue_id' => $model->Venue_id, 'Topic_id' => $model->Topic_id, 'ActivityType_id' => $model->ActivityType_id, 'Administrator_id' => $model->Administrator_id, 'Administrator_User_id' => $model->Administrator_User_id, 'Administrator_User_Participant_id' => $model->Administrator_User_Participant_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Activity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $Venue_id
     * @param integer $Topic_id
     * @param integer $ActivityType_id
     * @param integer $Administrator_id
     * @param integer $Administrator_User_id
     * @param integer $Administrator_User_Participant_id
     * @return mixed
     */
    public function actionDelete($id, $Venue_id, $Topic_id, $ActivityType_id, $Administrator_id, $Administrator_User_id, $Administrator_User_Participant_id)
    {
        $this->findModel($id, $Venue_id, $Topic_id, $ActivityType_id, $Administrator_id, $Administrator_User_id, $Administrator_User_Participant_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $Venue_id
     * @param integer $Topic_id
     * @param integer $ActivityType_id
     * @param integer $Administrator_id
     * @param integer $Administrator_User_id
     * @param integer $Administrator_User_Participant_id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $Venue_id, $Topic_id, $ActivityType_id, $Administrator_id, $Administrator_User_id, $Administrator_User_Participant_id)
    {
        if (($model = Activity::findOne(['id' => $id, 'Venue_id' => $Venue_id, 'Topic_id' => $Topic_id, 'ActivityType_id' => $ActivityType_id, 'Administrator_id' => $Administrator_id, 'Administrator_User_id' => $Administrator_User_id, 'Administrator_User_Participant_id' => $Administrator_User_Participant_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
