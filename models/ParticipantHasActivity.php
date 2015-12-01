<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Participant_has_Activity".
 *
 * @property integer $Participant_id
 * @property integer $Activity_id
 * @property integer $Activity_Venue_id
 * @property integer $Activity_Topic_id
 * @property integer $Activity_ActivityType_id
 * @property integer $attendance
 *
 * @property Participant $participant
 * @property Activity $activity
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
            [['Participant_id', 'Activity_id', 'Activity_Venue_id', 'Activity_Topic_id', 'Activity_ActivityType_id'], 'required'],
            [['Participant_id', 'Activity_id', 'Activity_Venue_id', 'Activity_Topic_id', 'Activity_ActivityType_id', 'attendance'], 'integer']
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
            'Activity_Venue_id' => 'Activity  Venue ID',
            'Activity_Topic_id' => 'Activity  Topic ID',
            'Activity_ActivityType_id' => 'Activity  Activity Type ID',
            'attendance' => 'Attendance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(Participant::className(), ['id' => 'Participant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['id' => 'Activity_id', 'Venue_id' => 'Activity_Venue_id', 'Topic_id' => 'Activity_Topic_id', 'ActivityType_id' => 'Activity_ActivityType_id']);
    }
}
