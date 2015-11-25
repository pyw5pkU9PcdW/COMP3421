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
 * @property string $datetime
 * @property integer $Venue_id
 * @property integer $Topic_id
 * @property integer $ActivityType_id
 * @property integer $Administrator_id
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
            [['name', 'description', 'personInCharge', 'lastModifyTime', 'datetime', 'Venue_id', 'Topic_id', 'ActivityType_id', 'Administrator_id'], 'required'],
            [['lastModifyTime', 'datetime'], 'safe'],
            [['Venue_id', 'Topic_id', 'ActivityType_id', 'Administrator_id'], 'integer'],
            [['name', 'documentLink', 'personInCharge'], 'string', 'max' => 45],
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
            'Venue_id' => 'Venue',
            'Topic_id' => 'Topic',
            'ActivityType_id' => 'Activity Type',
            'Administrator_id' => 'Administrator ID',
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

    public function beforeValidate() {
        $this->lastModifyTime = date("Y-m-d H:i:s");
        $this->Administrator_id = Yii::$app->user->id;
    }
}
