<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TextResponse".
 *
 * @property integer $id
 * @property string $content
 * @property integer $TextBox_id
 *
 * @property TextBox $textBox
 */
class TextResponse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TextResponse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TextBox_id'], 'required'],
            [['TextBox_id'], 'integer'],
            [['content'], 'string', 'max' => 1000]
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
            'TextBox_id' => 'Text Box ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTextBox()
    {
        return $this->hasOne(TextBox::className(), ['id' => 'TextBox_id']);
    }

    public function getResponseByQuestionId($id) {
        $raw = TextResponse::find()->where(['TextBox_id'=>$id])->select('content')->asArray()->all();
        $arr = [];
        foreach($raw as $row) {
            array_push($arr, $row['content']);
        }
        return $arr;
    }
}
