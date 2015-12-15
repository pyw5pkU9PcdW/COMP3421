<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "radiobutton".
 *
 * @property integer $id
 * @property string $content
 * @property integer $count
 * @property integer $Question_id
 */
class Radiobutton extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'radiobutton';
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

    public function checkIsRadioButtonByQuestionId($id) {
        if(Radiobutton::find()->where(['Question_id'=>$id])->exists() == 1) {
            return true;
        }
        return false;
    }

    public function getAllOptionsByQuestionId($id) {
        $raw = Radiobutton::find()->where(['Question_id'=>$id])->asArray()->all();
        $returnArr = [];
        foreach($raw as $row) {
            $returnArr[$row['id']] = $row['content'];
        }
        return $returnArr;
    }

    public function increaseOptionById($id) {
        $model = Radiobutton::findOne($id);
        $model->count = $model->count + 1;
        if($model->update()){
            return true;
        }
        return false;
    }

    public function getOptionsStatisticsByQuestionId($id) {
        return Radiobutton::find()->where(['Question_id'=>$id])->select(['content', 'count'])->orderBy(['count'=>SORT_DESC])->asArray()->all();
    }
}
