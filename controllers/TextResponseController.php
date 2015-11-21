<?php

namespace app\controllers;

use Yii;
use app\models\TextResponse;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TextResponseController implements the CRUD actions for TextResponse model.
 */
class TextResponseController extends Controller
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
     * Lists all TextResponse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => TextResponse::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TextResponse model.
     * @param integer $id
     * @param integer $TextBox_id
     * @return mixed
     */
    public function actionView($id, $TextBox_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $TextBox_id),
        ]);
    }

    /**
     * Creates a new TextResponse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TextResponse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'TextBox_id' => $model->TextBox_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TextResponse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $TextBox_id
     * @return mixed
     */
    public function actionUpdate($id, $TextBox_id)
    {
        $model = $this->findModel($id, $TextBox_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'TextBox_id' => $model->TextBox_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TextResponse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $TextBox_id
     * @return mixed
     */
    public function actionDelete($id, $TextBox_id)
    {
        $this->findModel($id, $TextBox_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TextResponse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $TextBox_id
     * @return TextResponse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $TextBox_id)
    {
        if (($model = TextResponse::findOne(['id' => $id, 'TextBox_id' => $TextBox_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
