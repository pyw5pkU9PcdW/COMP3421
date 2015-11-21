<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Announcement".
 *
 * @property integer $id
 * @property string $content
 * @property integer $datetime
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
            [['content', 'datetime', 'Administrator_id'], 'required'],
            [['datetime', 'Administrator_id'], 'integer'],
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
