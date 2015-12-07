<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Outside_Attraction".
 *
 * @property integer $id
 * @property string $Outside_Attraction_name
 * @property string $Outside_Attraction_description
 * @property string $Outside_Attraction_let
 * @property string $Outside_Attraction_lng
 * @property string $Outside_Attraction_image_file
 */
class OutsideAttraction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Outside_Attraction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Outside_Attraction_name', 'Outside_Attraction_description', 'Outside_Attraction_let', 'Outside_Attraction_lng', 'Outside_Attraction_image_file'], 'required'],
            [['Outside_Attraction_name'], 'string', 'max' => 100],
            [['Outside_Attraction_description'], 'string', 'max' => 1000],
            [['Outside_Attraction_let', 'Outside_Attraction_lng', 'Outside_Attraction_image_file'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Outside_Attraction_name' => 'Outside  Attraction Name',
            'Outside_Attraction_description' => 'Outside  Attraction Description',
            'Outside_Attraction_let' => 'Outside  Attraction Let',
            'Outside_Attraction_lng' => 'Outside  Attraction Lng',
            'Outside_Attraction_image_file' => 'Outside  Attraction Image File',
        ];
    }
}
