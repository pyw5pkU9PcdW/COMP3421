<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\PostReplay;
use app\models\User;

class NotificationController extends Controller
{
    public function actionGetNotifications() {
        $data = Yii::$app->request->post();
        $id = intval($data['id']);
        $replies = PostReplay::getAllUnreadRepliesByUserId($id);
        $arr = [];
        foreach($replies as $row) {
            $temp['type'] = 'post';
            $temp['id'] = $row['id'];
            $temp['content'] = '<strong>'.User::getUserFirstNameById($row['replier']).'</strong> has replied <strong>'.$row['title'].'</strong>';
            $temp['datetime'] = $row['datetime'];
            $temp['modelId'] = $row['modelId'];
            array_push($arr, $temp);
        }
        return json_encode($arr);
    }

    public function actionCheckNotificationCount() {
        $data = Yii::$app->request->post();
        $id = intval($data['id']);
        $replies = PostReplay::getAllUnreadRepliesByUserId($id);
        return sizeof($replies);
    }

    public function actionMarkNotificationRead() {
        $data = Yii::$app->request->post();
        $id = intval($data['id']);
        $type = $data['type'];
        if($type == 'post') {
            $model = PostReplay::findOne($id);
            $model->is_read = 1;
            if($model->save()) {
                return 0;
            }
        }
        return -1;
    }
}
