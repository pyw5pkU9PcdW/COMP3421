<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TextBox".
 *
 * @property integer $id
 *
 * @property Question $id0
 * @property TextResponse[] $textResponses
 */
class TextBox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TextBox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Question::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTextResponses()
    {
        return $this->hasMany(TextResponse::className(), ['TextBox_id' => 'id']);
    }
}
