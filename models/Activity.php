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
            [['name', 'description', 'documentLink', 'personInCharge', 'lastModifyTime', 'startDatetime', 'endDatetime', 'Venue_id', 'Topic_id', 'ActivityType_id', 'Administrator_id'], 'required'],
            [['personInCharge', 'Venue_id', 'Topic_id', 'ActivityType_id', 'Administrator_id'], 'integer'],
            [['lastModifyTime', 'startDatetime', 'endDatetime'], 'safe'],
            [['name'], 'string', 'max' => 100],
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
            'name' => 'Name',
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

    public function beforeValidate() {
        $this->lastModifyTime = date("Y-m-d H:i:s");
        $this->Administrator_id = Yii::$app->user->id;
    }

    public function getAllActivities() {
        return Activity::find()->orderBy('startDatetime')->asArray()->all();
    }
}
