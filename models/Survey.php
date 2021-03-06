<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Survey".
 *
 * @property integer $id
 * @property string $title
 * @property integer $Administrator_id
 * @property integer $is_enable
 *
 * @property Question[] $questions
 * @property Administrator $administrator
 * @property SurveyHasParticipant[] $surveyHasParticipants
 * @property Participant[] $participants
 */
class Survey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Survey';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'Administrator_id', 'is_enable'], 'required'],
            [['id', 'Administrator_id', 'is_enable'], 'integer'],
            [['title'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'Administrator_id' => 'Administrator ID',
            'is_enable' => 'Is Enable',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['Survey_id' => 'id']);
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
    public function getSurveyHasParticipants()
    {
        return $this->hasMany(SurveyHasParticipant::className(), ['Survey_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipants()
    {
        return $this->hasMany(Participant::className(), ['id' => 'Participant_id'])->viaTable('Survey_has_Participant', ['Survey_id' => 'id']);
    }

    public function getNewPostId() {
        $currentId = Survey::find()->orderBy(['id'=>SORT_DESC])->limit(1)->asArray()->all();
        if(count($currentId) > 0) {
            return $currentId[0]['id'] + 1;
        } else {
            return 1;
        }
    }

    public function getEnableSurvey() {
        return Survey::find()->where(['is_enable'=>1])->asArray()->all();
    }
}
