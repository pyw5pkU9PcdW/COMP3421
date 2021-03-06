<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ActivityType".
 *
 * @property integer $id
 * @property string $ActivityType_name
 * @property string $description
 * @property string $color
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
            [['ActivityType_name', 'description'], 'required'],
            [['ActivityType_name', 'color'], 'string', 'max' => 45],
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
            'ActivityType_name' => 'Activity Name',
            'description' => 'Description',
            'color' => 'Color',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivityTypeOptions() {
        $raw = ActivityType::find()->asArray()->all();
        $arr = array();
        foreach($raw as $row) {
            $arr[$row['id']] = $row['ActivityType_name'];
        }
        return $arr;
    }

    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['ActivityType_id' => 'id']);
    }

    public function getActivityTypeNameById($id) {
        $raw = ActivityType::findOne($id);
        return $raw['ActivityType_name'];
    }

    public function getActivityTypeThemeColorById($id) {
        $raw = ActivityType::findOne($id);
        return $raw['color'];
    }
}
