<?php

namespace app\controllers;

use Yii;
use app\models\Topic;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * TopicController implements the CRUD actions for Topic model.
 */
class TopicController extends Controller
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
     * Lists all Topic models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('topicIndex')) {
            $dataProvider = new ActiveDataProvider([
                'query' => Topic::find(),
            ]);

            return $this->render('index', [
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
     * Displays a single Topic model.
     * @param integer $id
     * @param integer $Category_id
     * @return mixed
     */
    public function actionView($id, $Category_id)
    {
        if(Yii::$app->user->can('topicView')) {
            return $this->render('view', [
                'model' => $this->findModel($id, $Category_id),
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
     * Creates a new Topic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('topicCreate')) {
            $model = new Topic();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'Category_id' => $model->Category_id]);
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
     * Updates an existing Topic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $Category_id
     * @return mixed
     */
    public function actionUpdate($id, $Category_id)
    {
        if(Yii::$app->user->can('topicUpdate')) {
            $model = $this->findModel($id, $Category_id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'Category_id' => $model->Category_id]);
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
     * Deletes an existing Topic model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $Category_id
     * @return mixed
     */
    public function actionDelete($id, $Category_id)
    {
        if(Yii::$app->user->can('topicDelete')) {
            $this->findModel($id, $Category_id)->delete();

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
     * Finds the Topic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $Category_id
     * @return Topic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $Category_id)
    {
        if (($model = Topic::findOne(['id' => $id, 'Category_id' => $Category_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function getTopicTypeOptions() {

    }
}
