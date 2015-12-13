<?php

namespace app\controllers;

use Yii;
use app\models\Question;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends Controller
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
     * Lists all Question models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Question::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Question model.
     * @param integer $id
     * @param integer $Survey_id
     * @return mixed
     */
    public function actionView($id, $Survey_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $Survey_id),
        ]);
    }

    public function actionInsert() {
        if(Yii::$app->user->can('surveyCreate')) {
            $data = Yii::$app->request->post();
            $model = new Question();
            $model->content = $data['content'];
            $model->order = $data['order'];
            $model->Survey_id = $data['surveyId'];
            if($model->save()) {
                return $model->getPrimaryKey();
            }
            return -1;
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }

    /**
     * Creates a new Question model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Question();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'Survey_id' => $model->Survey_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Question model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $Survey_id
     * @return mixed
     */
    public function actionUpdate($id, $Survey_id)
    {
        $model = $this->findModel($id, $Survey_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'Survey_id' => $model->Survey_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Question model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $Survey_id
     * @return mixed
     */
    public function actionDelete($id, $Survey_id)
    {
        $this->findModel($id, $Survey_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $Survey_id
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $Survey_id)
    {
        if (($model = Question::findOne(['id' => $id, 'Survey_id' => $Survey_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
