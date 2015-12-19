<?php

namespace app\controllers;

use Yii;
use app\models\Venue;
use app\models\VenueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

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
        if(Yii::$app->user->can('venueIndex')) {
            $searchModel = new VenueSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
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
     * Displays a single Venue model.
     * @param integer $id
     * @param integer $VenueType_id
     * @return mixed
     */
    public function actionView($id, $VenueType_id)
    {
        if(Yii::$app->user->can('venueView')) {
            return $this->render('view', [
                'model' => $this->findModel($id, $VenueType_id),
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
     * Creates a new Venue model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('venueCreate')) {
            $model = new Venue();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'VenueType_id' => $model->VenueType_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            if(Yii::$app->user->isGuest) {
                Yii::$app->user->loginRequired();
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }
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
        if(Yii::$app->user->can('venueUpdate')) {
            $model = $this->findModel($id, $VenueType_id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'VenueType_id' => $model->VenueType_id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            if(Yii::$app->user->isGuest) {
                Yii::$app->user->loginRequired();
            } else {
                throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            }
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
        if(Yii::$app->user->can('venueDelete')) {
            $this->findModel($id, $VenueType_id)->delete();

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
