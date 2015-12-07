<?php

namespace app\controllers;

use Yii;
use app\models\ActivitySearchGlobal;
use yii\web\ForbiddenHttpException;

class SearchController extends \yii\web\Controller
{
    public function actionIndex($search) {
        if($search != null && $search != '') {
            $searchModel = new ActivitySearchGlobal();
            $searchModel->globalSearch = $search;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'input' => $search,
                'result' => $dataProvider
            ]);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', 'Input something'));
        }
    }

}
