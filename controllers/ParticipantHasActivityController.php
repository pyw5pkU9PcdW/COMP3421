<?php

namespace app\controllers;

use Yii;
use app\models\ParticipantHasActivity;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParticipantHasActivityController implements the CRUD actions for ParticipantHasActivity model.
 */
class ParticipantHasActivityController extends Controller
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
     * Lists all ParticipantHasActivity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ParticipantHasActivity::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ParticipantHasActivity model.
     * @param integer $Participant_id
     * @param integer $Activity_id
     * @param integer $Activity_Venue_id
     * @param integer $Activity_Topic_id
     * @param integer $Activity_ActivityType_id
     * @return mixed
     */
    public function actionView($Participant_id, $Activity_id, $Activity_Venue_id, $Activity_Topic_id, $Activity_ActivityType_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Participant_id, $Activity_id, $Activity_Venue_id, $Activity_Topic_id, $Activity_ActivityType_id),
        ]);
    }

    /**
     * Creates a new ParticipantHasActivity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ParticipantHasActivity();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Participant_id' => $model->Participant_id, 'Activity_id' => $model->Activity_id, 'Activity_Venue_id' => $model->Activity_Venue_id, 'Activity_Topic_id' => $model->Activity_Topic_id, 'Activity_ActivityType_id' => $model->Activity_ActivityType_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ParticipantHasActivity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Participant_id
     * @param integer $Activity_id
     * @param integer $Activity_Venue_id
     * @param integer $Activity_Topic_id
     * @param integer $Activity_ActivityType_id
     * @return mixed
     */
    public function actionUpdate($Participant_id, $Activity_id, $Activity_Venue_id, $Activity_Topic_id, $Activity_ActivityType_id)
    {
        $model = $this->findModel($Participant_id, $Activity_id, $Activity_Venue_id, $Activity_Topic_id, $Activity_ActivityType_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Participant_id' => $model->Participant_id, 'Activity_id' => $model->Activity_id, 'Activity_Venue_id' => $model->Activity_Venue_id, 'Activity_Topic_id' => $model->Activity_Topic_id, 'Activity_ActivityType_id' => $model->Activity_ActivityType_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ParticipantHasActivity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Participant_id
     * @param integer $Activity_id
     * @param integer $Activity_Venue_id
     * @param integer $Activity_Topic_id
     * @param integer $Activity_ActivityType_id
     * @return mixed
     */
    public function actionDelete($Participant_id, $Activity_id, $Activity_Venue_id, $Activity_Topic_id, $Activity_ActivityType_id)
    {
        $this->findModel($Participant_id, $Activity_id, $Activity_Venue_id, $Activity_Topic_id, $Activity_ActivityType_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ParticipantHasActivity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Participant_id
     * @param integer $Activity_id
     * @param integer $Activity_Venue_id
     * @param integer $Activity_Topic_id
     * @param integer $Activity_ActivityType_id
     * @return ParticipantHasActivity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Participant_id, $Activity_id, $Activity_Venue_id, $Activity_Topic_id, $Activity_ActivityType_id)
    {
        if (($model = ParticipantHasActivity::findOne(['Participant_id' => $Participant_id, 'Activity_id' => $Activity_id, 'Activity_Venue_id' => $Activity_Venue_id, 'Activity_Topic_id' => $Activity_Topic_id, 'Activity_ActivityType_id' => $Activity_ActivityType_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}