<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Post".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $datetime
 * @property integer $Participant_id
 * @property integer $Topic_id
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'datetime', 'Participant_id', 'Topic_id'], 'required'],
            [['datetime'], 'safe'],
            [['Participant_id', 'Topic_id'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['content'], 'string', 'max' => 2000]
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
            'content' => 'Content',
            'datetime' => 'Datetime',
            'Participant_id' => 'Participant ID',
            'Topic_id' => 'Topic ID',
        ];
    }

    public function getTopic() {
        return $this->hasOne(Topic::className(), ['id' => 'Topic_id']);
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'Participant_id']);
    }

    public function getPostTileByPostId($id) {
        $raw = Post::findOne($id);
        return $raw['title'];
    }
}
