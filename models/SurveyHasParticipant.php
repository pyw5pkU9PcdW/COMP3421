<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Survey_has_Participant".
 *
 * @property integer $Survey_id
 * @property integer $Participant_id
 *
 * @property Survey $survey
 * @property Participant $participant
 * @property string $datetime
 */
class SurveyHasParticipant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Survey_has_Participant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Survey_id', 'Participant_id', 'datetime'], 'required'],
            [['Survey_id', 'Participant_id'], 'integer'],
            [['datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Survey_id' => 'Survey ID',
            'Participant_id' => 'Participant ID',
            'datetime' => 'Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurvey()
    {
        return $this->hasOne(Survey::className(), ['id' => 'Survey_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(Participant::className(), ['id' => 'Participant_id']);
    }

    public function checkParticipantHasDone($id) {
        if(SurveyHasParticipant::find()->where(['Participant_id'=>Yii::$app->user->id, 'Survey_id'=>$id])->exists() == 1) {
            return true;
        }
        return false;
    }
}
