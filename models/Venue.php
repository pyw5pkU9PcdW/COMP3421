<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Venue".
 *
 * @property integer $id
 * @property string $name
 * @property string $location
 * @property string $map
 * @property string $floorPlan
 * @property integer $VenueType_id
 *
 * @property Activity[] $activities
 * @property VenueType $venueType
 */
class Venue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Venue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'location', 'map', 'VenueType_id'], 'required'],
            [['VenueType_id'], 'integer'],
            [['name', 'location', 'map', 'floorPlan'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'location' => 'Location',
            'map' => 'Map',
            'floorPlan' => 'Floor Plan',
            'VenueType_id' => 'Venue Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['Venue_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenueType()
    {
        return $this->hasOne(VenueType::className(), ['id' => 'VenueType_id']);
    }

    /**
     * @return array
     */
    public function getVenueOptions() {
        $raw = Venue::find()->orderBy('VenueType_id')->all();
        $arr = array();
        foreach($raw as $row) {
            $venueType = \app\models\VenueType::getVenueTypeById($row['VenueType_id']);
            $arr[$row['id']] = $venueType.' - '.$row['name'];
        }
        return $arr;
    }
}
