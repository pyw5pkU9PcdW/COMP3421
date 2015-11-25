<?php

namespace app\controllers;

use Yii;
use app\models\SurveyHasParticipant;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SurveyHasParticipantController implements the CRUD actions for SurveyHasParticipant model.
 */
class SurveyHasParticipantController extends Controller
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
     * Lists all SurveyHasParticipant models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SurveyHasParticipant::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SurveyHasParticipant model.
     * @param integer $Survey_id
     * @param integer $Participant_id
     * @return mixed
     */
    public function actionView($Survey_id, $Participant_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Survey_id, $Participant_id),
        ]);
    }

    /**
     * Creates a new SurveyHasParticipant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SurveyHasParticipant();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Survey_id' => $model->Survey_id, 'Participant_id' => $model->Participant_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SurveyHasParticipant model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Survey_id
     * @param integer $Participant_id
     * @return mixed
     */
    public function actionUpdate($Survey_id, $Participant_id)
    {
        $model = $this->findModel($Survey_id, $Participant_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Survey_id' => $model->Survey_id, 'Participant_id' => $model->Participant_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SurveyHasParticipant model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Survey_id
     * @param integer $Participant_id
     * @return mixed
     */
    public function actionDelete($Survey_id, $Participant_id)
    {
        $this->findModel($Survey_id, $Participant_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SurveyHasParticipant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Survey_id
     * @param integer $Participant_id
     * @return SurveyHasParticipant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Survey_id, $Participant_id)
    {
        if (($model = SurveyHasParticipant::findOne(['Survey_id' => $Survey_id, 'Participant_id' => $Participant_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
