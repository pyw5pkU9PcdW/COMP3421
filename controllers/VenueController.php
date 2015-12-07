<?php

namespace app\controllers;

use Yii;
use app\models\Venue;
use app\models\VenueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VenueController implements the CRUD actions for Venue model.
 */
class VenueController extends Controller
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
     * Lists all Venue models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VenueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Venue model.
     * @param integer $id
     * @param integer $VenueType_id
     * @return mixed
     */
    public function actionView($id, $VenueType_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $VenueType_id),
        ]);
    }

    /**
     * Creates a new Venue model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Venue();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'VenueType_id' => $model->VenueType_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Venue model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $VenueType_id
     * @return mixed
     */
    public function actionUpdate($id, $VenueType_id)
    {
        $model = $this->findModel($id, $VenueType_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'VenueType_id' => $model->VenueType_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Venue model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $VenueType_id
     * @return mixed
     */
    public function actionDelete($id, $VenueType_id)
    {
        $this->findModel($id, $VenueType_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Venue model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $VenueType_id
     * @return Venue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $VenueType_id)
    {
        if (($model = Venue::findOne(['id' => $id, 'VenueType_id' => $VenueType_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
