<?php

namespace app\controllers;

use Yii;
use app\models\CheckButton;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CheckButtonController implements the CRUD actions for CheckButton model.
 */
class CheckButtonController extends Controller
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
     * Lists all CheckButton models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CheckButton::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CheckButton model.
     * @param integer $id
     * @param integer $Question_id
     * @return mixed
     */
    public function actionView($id, $Question_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $Question_id),
        ]);
    }

    public function actionInsert() {
        if(Yii::$app->user->can('surveyCreate')) {
            $data = Yii::$app->request->post();
            $model = new CheckButton();
            $model->Question_id = $data['id'];
            $model->content = $data['content'];
            $model->count = 0;
            if($model->save()) {
                return 0;
            }
            return -1;
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }

    /**
     * Creates a new CheckButton model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CheckButton();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'Question_id' => $model->Question_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CheckButton model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $Question_id
     * @return mixed
     */
    public function actionUpdate($id, $Question_id)
    {
        $model = $this->findModel($id, $Question_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'Question_id' => $model->Question_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CheckButton model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $Question_id
     * @return mixed
     */
    public function actionDelete($id, $Question_id)
    {
        $this->findModel($id, $Question_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CheckButton model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $Question_id
     * @return CheckButton the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $Question_id)
    {
        if (($model = CheckButton::findOne(['id' => $id, 'Question_id' => $Question_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
