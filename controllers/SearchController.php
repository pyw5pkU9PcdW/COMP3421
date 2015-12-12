<?php

namespace app\controllers;

use Yii;
use app\models\ActivitySearchGlobal;
use app\models\OutsideAttractionSearchGlobal;
use app\models\PostSearchGlobal;
use yii\web\ForbiddenHttpException;
use yii\helpers\BaseArrayHelper;

class SearchController extends \yii\web\Controller
{
    public function actionIndex($search) {
        if($search != null && $search != '') {
            $search = htmlspecialchars($search, ENT_HTML5);
            $activitySearchModel = new ActivitySearchGlobal();
            $activitySearchModel->globalSearch = $search;
            $activitySearchModelDataProvider = $activitySearchModel->search(Yii::$app->request->queryParams);

            $outdoorAttractionSearchModel = new OutsideAttractionSearchGlobal();
            $outdoorAttractionSearchModel->globalSearch = $search;
            $outdoorAttractionDataProvider = $outdoorAttractionSearchModel->search(Yii::$app->request->queryParams);

            $dataProvider = BaseArrayHelper::merge($activitySearchModelDataProvider, $outdoorAttractionDataProvider);

            $postSearchModel = new PostSearchGlobal();
            $postSearchModel->globalSearch = $search;
            $postDataProvider = $postSearchModel->search(Yii::$app->request->queryParams);

            $dataProvider = BaseArrayHelper::merge($dataProvider, $postDataProvider);

            return $this->render('index', [
                'input' => $search,
                'result' => $dataProvider
            ]);
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', 'Input something'));
        }
    }

}
