<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "VenueType".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property Venue[] $venues
 */
class VenueType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'VenueType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name'], 'string', 'max' => 45],
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
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenues()
    {
        return $this->hasMany(Venue::className(), ['VenueType_id' => 'id']);
    }

    public function getVenueTypeOptions() {
        $raw = VenueType::find()->all();
        $arr = array();
        foreach($raw as $row) {
            $arr[$row['id']] = $row['name'];
        }
        return $arr;
    }

    public function getVenueTypeById($id) {
        $raw = VenueType::findOne($id);
        return $raw['name'];
    }
}
