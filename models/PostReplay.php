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
}
