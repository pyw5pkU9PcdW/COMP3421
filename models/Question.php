<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Question".
 *
 * @property integer $id
 * @property string $content
 * @property integer $Survey_id
 * @property integer $order
 *
 * @property CheckButton[] $checkButtons
 * @property RadioButton[] $radioButtons
 * @property TextBox $textBox
 * @property integer $required
 * @property string $temp_input
 * @property string $temp_input_required
 * @property integer $temp_type
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'Survey_id', 'order', 'required', 'temp_input_required'], 'required'],
            [['Survey_id', 'order', 'required', 'temp_type'], 'integer'],
            [['content'], 'string', 'max' => 500],
            [['temp_input', 'temp_input_required'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'Survey_id' => 'Survey ID',
            'order' => 'Order',
            'required' => 'Required',
            'temp_input' => 'Temp Input',
            'temp_input_required' => 'Temp Input Required',
            'temp_type' => 'Temp Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckButtons()
    {
        return $this->hasMany(CheckButton::className(), ['Question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadioButtons()
    {
        return $this->hasMany(RadioButton::className(), ['Question_id' => 'id']);
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
    public function getTextBox()
    {
        return $this->hasOne(TextBox::className(), ['id' => 'id']);
    }

    public function getAllQuestionBySurveyId($id) {
        return Question::find()->where(['Survey_id'=>$id])->orderBy('order')->asArray()->all();
    }
}
