<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "CheckButton".
 *
 * @property integer $id
 * @property string $content
 * @property integer $count
 * @property integer $Question_id
 *
 * @property Question $question
 */
class Checkbutton extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CheckButton';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'Question_id'], 'required'],
            [['count', 'Question_id'], 'integer'],
            [['content'], 'string', 'max' => 256]
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
            'count' => 'Count',
            'Question_id' => 'Question ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'Question_id']);
    }

    public function checkIsCheckBoxByQuestionId($id) {
        if(Checkbutton::find()->where(['Question_id'=>$id])->exists() == 1) {
            return true;
        }
        return false;
    }

    public function getAllOptionsByQuestionId($id) {
        $raw = Checkbutton::find()->where(['Question_id'=>$id])->asArray()->all();
        $returnArr = [];
        foreach($raw as $row) {
            $returnArr[$row['id']] = $row['content'];
        }
        return $returnArr;
    }

    public function increaseOptionById($id) {
        $model = Checkbutton::findOne($id);
        $model->count = $model->count + 1;
        if($model->update()){
            return true;
        }
        return false;
    }
}
