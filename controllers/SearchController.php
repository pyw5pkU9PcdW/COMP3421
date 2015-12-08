<?php

namespace app\controllers;

use Yii;
use app\models\ActivitySearchGlobal;
use app\models\OutsideAttractionSearchGlobal;
use yii\web\ForbiddenHttpException;
use yii\helpers\BaseArrayHelper;

class SearchController extends \yii\web\Controller
{
    public function actionIndex($search) {
        if($search != null && $search != '') {
            $activitySearchModel = new ActivitySearchGlobal();
            $activitySearchModel->globalSearch = $search;
            $activitySearchModelDataProvider = $activitySearchModel->search(Yii::$app->request->queryParams);

            $outdoorAttractionSearchModel = new OutsideAttractionSearchGlobal();
            $outdoorAttractionSearchModel->globalSearch = $search;
            $outdoorAttractionDataProvider = $outdoorAttractionSearchModel->search(Yii::$app->request->queryParams);

            $dataProvider = BaseArrayHelper::merge($activitySearchModelDataProvider, $outdoorAttractionDataProvider);

            return $this->render('index', [
                'input' => $search,
                'result' => $dataProvider
            ]);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', 'Input something'));
        }
    }

}
