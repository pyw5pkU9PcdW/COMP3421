<?php
/**
 * Created by PhpStorm.
 * User: Ansonmouse
 * Date: 15/12/2015
 * Time: 11:20 AM
 */

namespace app\models;


use yii\base\Model;

class Notification extends Model {
    public function getTopNotifications() {
        $replies = PostReplay::getAllUnreadReplies();
        return json_encode($replies);
    }
}