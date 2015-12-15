<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Announcement".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $datetime
 * @property integer $Administrator_id
 *
 * @property Administrator $administrator
 */
class Announcement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Announcement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'datetime', 'Administrator_id'], 'required'],
            [['datetime'], 'safe'],
            [['Administrator_id'], 'integer'],
            [['title'], 'string', 'max' => 400],
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
            'Administrator_id' => 'Administrator ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrator()
    {
        return $this->hasOne(Administrator::className(), ['id' => 'Administrator_id']);
    }
}
