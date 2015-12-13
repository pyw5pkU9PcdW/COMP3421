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
            [['content', 'Survey_id'], 'required'],
            [['Survey_id', 'order'], 'integer'],
            [['content'], 'string', 'max' => 500]
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
}
