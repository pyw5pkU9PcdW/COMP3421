<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ActivityType".
 *
 * @property integer $id
 * @property string $activityName
 * @property string $description
 *
 * @property Activity[] $activities
 */
class ActivityType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ActivityType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activityName', 'description'], 'required'],
            [['activityName'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activityName' => 'Activity Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        $raw = ActivityType::find()->asArray()->all();
        $arr = array();
        foreach($raw as $row) {
            $arr[$row['id']] = $row['activityName'];
        }
        return $arr;
    }
}
