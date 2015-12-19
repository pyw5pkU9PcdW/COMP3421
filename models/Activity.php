<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Activity".
 *
 * @property integer $id
 * @property string $Activity_name
 * @property string $description
 * @property string $documentLink
 * @property integer $personInCharge
 * @property string $lastModifyTime
 * @property string $startDatetime
 * @property string $endDatetime
 * @property integer $Venue_id
 * @property integer $Topic_id
 * @property integer $ActivityType_id
 * @property integer $Administrator_id
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Activity_name', 'description', 'documentLink', 'personInCharge', 'lastModifyTime', 'startDatetime', 'endDatetime', 'Venue_id', 'Topic_id', 'ActivityType_id', 'Administrator_id'], 'required'],
            [['personInCharge', 'Venue_id', 'Topic_id', 'ActivityType_id', 'Administrator_id'], 'integer'],
            [['Activity_name', 'description', 'lastModifyTime', 'startDatetime', 'endDatetime'], 'safe'],
            [['Activity_name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 1000],
            [['documentLink'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Activity_name' => 'Name',
            'description' => 'Description',
            'documentLink' => 'Document Link',
            'personInCharge' => 'Person In Charge',
            'lastModifyTime' => 'Last Modify Time',
            'startDatetime' => 'Start Datetime',
            'endDatetime' => 'End Datetime',
            'Venue_id' => 'Venue ID',
            'Topic_id' => 'Topic ID',
            'ActivityType_id' => 'Activity Type ID',
            'Administrator_id' => 'Administrator ID',
        ];
    }

    public function getVenue() {
        return $this->hasOne(Venue::className(), ['id' => 'Venue_id']);
    }

    public function getTopic() {
        return $this->hasOne(Topic::className(), ['id' => 'Topic_id']);
    }

    public function getActivityType() {
        return $this->hasOne(ActivityType::className(), ['id' => 'ActivityType_id']);
    }

    public function getPersonInCharge() {
        return $this->hasOne(User::className(), ['id' => 'personInCharge']);
    }

    public function getAllActivities() {
        return Activity::find()->orderBy('startDatetime')->asArray()->all();
    }

    public function getJoinActivity() {
        $sql = 'SELECT * FROM 13027272d.Participant_has_Activity, 13027272d.Activity
                WHERE Participant_id = '.Yii::$app->user->id.'
                AND 13027272d.Participant_has_Activity.Activity_id = 13027272d.Activity.id
                 ORDER BY startDatetime ASC
                 LIMIT 5';
        $raw = Activity::findBySql($sql)->asArray()->all();
        return $raw;
    }

    public function getActivitiesByPicUserId($id) {
        return Activity::find()->where(['personInCharge'=>$id])->asArray()->all();
    }
}
