<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Participant_has_Activity".
 *
 * @property integer $Participant_id
 * @property integer $Activity_id
 * @property integer $attendance
 * @property string $register_datetime
 * @property string $attend_datetime
 * @property integer $is_read
 */
class ParticipantHasActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Participant_has_Activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Participant_id', 'Activity_id', 'is_read'], 'required'],
            [['Participant_id', 'Activity_id', 'attendance', 'is_read'], 'integer'],
            [['register_datetime', 'attend_datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Participant_id' => 'Participant ID',
            'Activity_id' => 'Activity ID',
            'attendance' => 'Attendance',
            'register_datetime' => 'Register Datetime',
            'attend_datetime' => 'Attend Datetime',
            'is_read' => 'Is Read',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(ActivityOld::className(), ['id' => 'Activity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(Participant::className(), ['id' => 'Participant_id']);
    }

    public function checkHasJoin($activityId) {
        if(ParticipantHasActivity::find()->where(['Participant_id'=>Yii::$app->user->id, 'Activity_id'=>$activityId])->exists() == 1) {
            return true;
        }
        return false;
    }

    public function getTodayUnreadActivityByUserId($id) {
        $sql = 'SELECT Activity.id AS id, Activity_name AS title, startDatetime AS datetime, Venue.name AS venue
                FROM 13027272d.Activity, 13027272d.Participant_has_Activity, 13027272d.Venue WHERE
                13027272d.Activity.id = 13027272d.Participant_has_Activity.Activity_id
                AND 13027272d.Venue.id = 13027272d.Activity.Venue_id
                AND 13027272d.Participant_has_Activity.Participant_id = '.$id.'
                AND Participant_has_Activity.Participant_id <> Activity.Administrator_id
                AND is_read = 0
                ORDER BY startDatetime DESC;';
        $raw =  ParticipantHasActivity::findBySql($sql)->asArray()->all();
        //return $raw;
        $arr = [];
        foreach($raw as $row) {
            $today = strtotime(date("Y-m-d"));
            $eventTimestamp = strtotime($row['datetime']);
            if($eventTimestamp > $today && $eventTimestamp < $today+86400) {
                array_push($arr, $row);
            }
        }
        return $arr;
    }
}
