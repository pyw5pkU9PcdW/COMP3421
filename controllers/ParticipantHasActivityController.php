<?php

namespace app\controllers;

use app\models\Activity;
use app\models\User;
use Yii;
use app\models\ParticipantHasActivity;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

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
     * @return mixed
     */
    public function actionView($Participant_id, $Activity_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Participant_id, $Activity_id),
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
            return $this->redirect(['view', 'Participant_id' => $model->Participant_id, 'Activity_id' => $model->Activity_id]);
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
     * @return mixed
     */
    public function actionUpdate($Participant_id, $Activity_id)
    {
        $model = $this->findModel($Participant_id, $Activity_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Participant_id' => $model->Participant_id, 'Activity_id' => $model->Activity_id]);
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
     * @return mixed
     */
    public function actionDelete($Participant_id, $Activity_id)
    {
        $this->findModel($Participant_id, $Activity_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ParticipantHasActivity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Participant_id
     * @param integer $Activity_id
     * @return ParticipantHasActivity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Participant_id, $Activity_id)
    {
        if (($model = ParticipantHasActivity::findOne(['Participant_id' => $Participant_id, 'Activity_id' => $Activity_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionJoin($activityId) {
        if(Yii::$app->user->can('participantHasActivityCreate')) {
            if(!ParticipantHasActivity::checkHasJoin($activityId)) {
                $model = new ParticipantHasActivity();
                $model->Activity_id = $activityId;
                $model->Participant_id = Yii::$app->user->id;
                $model->register_datetime = date("Y-m-d H:i:s");
                $model->is_read = 0;
                if($model->save()) {
                    return Yii::$app->runAction('activity/view', ['id'=>$activityId]);
                }
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', 'You have joined this activity.'));
            }

        } else {
            if(Yii::$app->user->isGuest) {
                Yii::$app->user->loginRequired();
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }
        }
    }

    public function actionQuit($activityId) {
        if(Yii::$app->user->can('participantHasActivityDelete')) {
            if(ParticipantHasActivity::checkHasJoin($activityId)) {
                $this->findModel(Yii::$app->user->id, $activityId)->delete();
                return Yii::$app->runAction('activity/view', ['id'=>$activityId]);
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', 'You have NOT joined this activity.'));
            }

        } else {
            if(Yii::$app->user->isGuest) {
                Yii::$app->user->loginRequired();
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }
        }
    }

    public function actionAttend($id, $activity, $user, $token) {
        if(($admin = User::findByUsername($user)) !== null) {
            $auth = \Yii::$app->authManager;
            if(password_verify($token, $admin->password) && $auth->checkAccess($admin->id, 'participantHasActivity')) {
                if(($model = ParticipantHasActivity::findOne(['Participant_id'=>$id, 'Activity_id'=>$activity])) !== null) {
                    if($model->attendance != 1) {
                        $model->attendance = 1;
                        $model->attend_datetime = date("Y-m-d H:i:s");
                        \app\models\User::addScore(10, $id);
                        if($model->save()) {
                            die('success');
                        }
                    } else {
                        die('Attended');
                    }
                }
            }
        }
        die('fail');
    }
}
