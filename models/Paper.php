<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Paper".
 *
 * @property integer $id
 * @property string $title
 * @property string $abstract
 * @property integer $Topic_id
 * @property integer $NormalPeople_id
 *
 * @property Topic $topic
 * @property NormalPeople $normalPeople
 */
class Paper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Paper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Topic_id', 'NormalPeople_id'], 'required'],
            [['Topic_id', 'NormalPeople_id'], 'integer'],
            [['title', 'abstract'], 'string', 'max' => 45]
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
            'abstract' => 'Abstract',
            'Topic_id' => 'Topic ID',
            'NormalPeople_id' => 'Normal People ID',
        ];
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
    public function getNormalPeople()
    {
        return $this->hasOne(NormalPeople::className(), ['id' => 'NormalPeople_id']);
    }
}
