<?php

namespace app\controllers;

use Yii;
use app\models\ParticipantHasCoupon;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParticipantHasCouponController implements the CRUD actions for ParticipantHasCoupon model.
 */
class ParticipantHasCouponController extends Controller
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
     * Lists all ParticipantHasCoupon models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ParticipantHasCoupon::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ParticipantHasCoupon model.
     * @param integer $Participant_id
     * @param integer $coupon_id
     * @return mixed
     */
    public function actionView($Participant_id, $coupon_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Participant_id, $coupon_id),
        ]);
    }

    /**
     * Creates a new ParticipantHasCoupon model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ParticipantHasCoupon();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Participant_id' => $model->Participant_id, 'coupon_id' => $model->coupon_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ParticipantHasCoupon model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Participant_id
     * @param integer $coupon_id
     * @return mixed
     */
    public function actionUpdate($Participant_id, $coupon_id)
    {
        $model = $this->findModel($Participant_id, $coupon_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Participant_id' => $model->Participant_id, 'coupon_id' => $model->coupon_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ParticipantHasCoupon model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Participant_id
     * @param integer $coupon_id
     * @return mixed
     */
    public function actionDelete($Participant_id, $coupon_id)
    {
        $this->findModel($Participant_id, $coupon_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ParticipantHasCoupon model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Participant_id
     * @param integer $coupon_id
     * @return ParticipantHasCoupon the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Participant_id, $coupon_id)
    {
        if (($model = ParticipantHasCoupon::findOne(['Participant_id' => $Participant_id, 'coupon_id' => $coupon_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
