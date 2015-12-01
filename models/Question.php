<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Question".
 *
 * @property integer $id
 * @property string $content
 * @property integer $Survey_id
 *
 * @property CheckButton[] $checkButtons
 * @property Survey $survey
 * @property RadioButton[] $radioButtons
 * @property TextBox $textBox
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
            [['id', 'content', 'Survey_id'], 'required'],
            [['id', 'Survey_id'], 'integer'],
            [['content'], 'string', 'max' => 45]
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
    public function getSurvey()
    {
        return $this->hasOne(Survey::className(), ['id' => 'Survey_id']);
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
    public function getTextBox()
    {
        return $this->hasOne(TextBox::className(), ['id' => 'id']);
    }
}
