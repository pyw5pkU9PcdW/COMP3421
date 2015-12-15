<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Post_Replay".
 *
 * @property integer $id
 * @property integer $Post_id
 * @property integer $Participant_id
 * @property string $content
 * @property string $datetime
 * @property integer $is_read
 */
class PostReplay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Post_Replay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Post_id', 'Participant_id', 'content', 'datetime', 'is_read'], 'required'],
            [['Post_id', 'Participant_id', 'is_read'], 'integer'],
            [['datetime'], 'safe'],
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
            'Post_id' => 'Post ID',
            'Participant_id' => 'Participant ID',
            'content' => 'Content',
            'datetime' => 'Datetime',
            'is_read' => 'Is Read',
        ];
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'Participant_id']);
    }

    public function getPost() {
        return $this->hasOne(Post::className(), ['id' => 'Post_id']);
    }

    public function getAllRepliesByPostId($id) {
        return PostReplay::find()->where(['Post_id' => $id])->orderBy('datetime')->asArray()->all();
    }

    public function getAllRepliesPeopleByPostId($id) {
        return PostReplay::find()->where(['Post_id' => $id])->select('Participant_id')->distinct()->asArray()->all();
    }

    public function getLatestReplyDatetimeByPostId($id) {
        return PostReplay::find()->where(['Post_id' => $id])->select('datetime')->orderBy(['datetime' => SORT_DESC])->limit(1)->asArray()->all();
    }

    public function getAllUnreadRepliesByUserId($id) {
        $sql = 'SELECT Post.id AS id, Post_Replay.id AS modelId, title, Post_Replay.content AS reply, Post_Replay.datetime, Post_Replay.Participant_id AS replier FROM 13027272d.Post, 13027272d.Post_Replay WHERE
                13027272d.Post_Replay.Post_id = 13027272d.Post.id
                AND 13027272d.Post.Participant_id = '.$id.'
                AND is_read = 0
                AND Post.Participant_id <> Post_Replay.Participant_id
                ORDER BY Post_Replay.datetime ASC;';
        return PostReplay::findBySql($sql)->asArray()->all();
    }

    public function markReplyAsReadByReplyId($id) {
    }
}
