<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Activity".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $documentLink
 * @property string $personInCharge
 * @property string $lastModifyTime
 * @property integer $datetime
 * @property integer $Venue_id
 * @property integer $Topic_id
 * @property integer $ActivityType_id
 * @property integer $Administrator_id
 * @property integer $Administrator_User_id
 * @property integer $Administrator_User_Participant_id
 *
 * @property Venue $venue
 * @property Topic $topic
 * @property ActivityType $activityType
 * @property Administrator $administrator
 * @property ParticipantHasActivity[] $participantHasActivities
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
            [['name', 'description', 'personInCharge', 'lastModifyTime', 'datetime', 'Venue_id', 'Topic_id', 'ActivityType_id', 'Administrator_id', 'Administrator_User_id', 'Administrator_User_Participant_id'], 'required'],
            [['datetime', 'Venue_id', 'Topic_id', 'ActivityType_id', 'Administrator_id', 'Administrator_User_id', 'Administrator_User_Participant_id'], 'integer'],
            [['name', 'documentLink', 'personInCharge', 'lastModifyTime'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'documentLink' => 'Document Link',
            'personInCharge' => 'Person In Charge',
            'lastModifyTime' => 'Last Modify Time',
            'datetime' => 'Datetime',
            'Venue_id' => 'Venue ID',
            'Topic_id' => 'Topic ID',
            'ActivityType_id' => 'Activity Type ID',
            'Administrator_id' => 'Administrator ID',
            'Administrator_User_id' => 'Administrator  User ID',
            'Administrator_User_Participant_id' => 'Administrator  User  Participant ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenue()
    {
        return $this->hasOne(Venue::className(), ['id' => 'Venue_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopic()
    {
        return $this->hasOne(Topic::className(), ['id' => 'Topic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivityType()
    {
        return $this->hasOne(ActivityType::className(), ['id' => 'ActivityType_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrator()
    {
        return $this->hasOne(Administrator::className(), ['id' => 'Administrator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantHasActivities()
    {
        return $this->hasMany(ParticipantHasActivity::className(), ['Activity_id' => 'id', 'Activity_Venue_id' => 'Venue_id', 'Activity_Topic_id' => 'Topic_id', 'Activity_ActivityType_id' => 'ActivityType_id']);
    }
}
