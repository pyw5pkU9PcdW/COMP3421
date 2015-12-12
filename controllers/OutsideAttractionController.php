<?php

namespace app\controllers;

use Yii;
use app\models\OutsideAttraction;
use app\models\OutsideAttractionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use mPDF;

/**
 * OutsideAttractionController implements the CRUD actions for OutsideAttraction model.
 */
class OutsideAttractionController extends Controller
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
     * Lists all OutsideAttraction models.
     * @return mixed
     */
    public function actionIndex()
    {
        $allAttractions = OutsideAttraction::getAllOutsideAttractions();
        $searchModel = new OutsideAttractionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'allAttractions' => $allAttractions,
        ]);
    }

    /**
     * Displays a single OutsideAttraction model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSamplepdf($id) {
        $model = $this->findModel($id);
        $imgLink = "../resources/travel/".$model->Outside_Attraction_image_file;
        $content = '
            <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>'.$model->Outside_Attraction_name.'</h1>
            <p class="outside-attraction-description">'.$model->Outside_Attraction_description.'</p>
            <p class="text-center"><img src="'.$imgLink.'" class="outside-attraction-img"></p>
            </div>
            <div class="col-sm-12 outside-attraction-map">
                <div id="googleMap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2853.914174775117!2d114.17814436925319!3d22.304711666689073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x5aeb1a34766d7fa0!2z6aaZ5riv55CG5bel5aSn5a24!5e0!3m2!1szh-TW!2shk!4v1449911038682" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
            </div>
            </div>
            </div>
        ';
        $mpdf = new mPDF;
        $mpdf->WriteHTML($content);
        $mpdf->Output();

        exit;
    }

    /**
     * Creates a new OutsideAttraction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OutsideAttraction();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OutsideAttraction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OutsideAttraction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OutsideAttraction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OutsideAttraction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OutsideAttraction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
