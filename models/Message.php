<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Message".
 *
 * @property integer $id
 * @property string $receiverId
 * @property string $content
 * @property integer $User_id
 *
 * @property User $user
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receiverId', 'content', 'User_id'], 'required'],
            [['User_id'], 'integer'],
            [['receiverId', 'content'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receiverId' => 'Receiver ID',
            'content' => 'Content',
            'User_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'User_id']);
    }
}
