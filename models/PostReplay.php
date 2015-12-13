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
            [['Post_id', 'Participant_id', 'content', 'datetime'], 'required'],
            [['Post_id', 'Participant_id'], 'integer'],
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
}
