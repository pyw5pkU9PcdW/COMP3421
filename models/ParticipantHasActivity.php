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
}
