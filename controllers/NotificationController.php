<?php

namespace app\controllers;

use app\models\AnnouncementHasParticipant;
use app\models\ParticipantHasActivity;
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
            $temp['content'] = '<strong>'.User::getUserFirstNameById($row['replier']).'</strong> has replied <strong>'.substr($row['title'], 0, 40).'</strong>';
            $temp['datetime'] = $row['datetime'];
            $temp['modelId'] = $row['modelId'];
            $temp['timestamp'] = strtotime($row['datetime']);
            array_push($arr, $temp);
        }

        $announcement = AnnouncementHasParticipant::getUnreadAnnouncementByUserId($id);
        foreach($announcement as $row) {
            $temp['type'] = 'announcement';
            $temp['id'] = $id;
            $temp['modelId'] = $row['id'];
            $temp['datetime'] = $row['datetime'];
            $temp['content'] = 'New announcement about <strong>'.substr($row['title'], 0, 40).'</strong>';
            $temp['timestamp'] = strtotime($row['datetime']);
            array_push($arr, $temp);
        }

        $activity = ParticipantHasActivity::getTodayUnreadActivityByUserId($id);
        foreach($activity as $row) {
            $temp['type'] = 'activity';
            $temp['id'] = $id;
            $temp['modelId'] = $row['id'];
            $temp['datetime'] = $row['datetime'];
            $temp['timestamp'] = strtotime($row['datetime']);
            $temp['content'] = 'Remember to attend <strong>'.$row['title'].'</strong> at <strong>'.$row['venue'].'</strong>';
            array_push($arr, $temp);
        }

        function cmp($a, $b) {
            if ($a['timestamp'] == $b['timestamp']) {
                return 0;
            }
            return ($a['timestamp'] > $b['timestamp']) ? -1 : 1;
        }

        //usort($arr, "cmp");

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
        $modelId = intval($data['modelId']);
        $type = $data['type'];
        if($type == 'post') {
            $model = PostReplay::findOne($modelId);
            $model->is_read = 1;
            if($model->save()) {
                return 0;
            }
        }
        if($type == 'announcement') {
            $model = AnnouncementHasParticipant::findOne(['Accouncement_id' => $modelId, 'Participant_id' => $id]);
            $model->is_read = 1;
            if($model->save()) {
                return 0;
            }
        }
        if($type == 'activity') {
            $model = ParticipantHasActivity::findOne(['Participant_id' => $id, 'Activity_id' => $modelId]);
            $model->is_read = 1;
            if($model->save()) {
                return 0;
            }
        }
        return -1;
    }
}
