<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Country".
 *
 * @property integer $id
 * @property string $name
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 100]
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
        ];
    }

    public function getCountryOptions() {
        $raw = Country::find()->all();
        $arr = array();
        foreach($raw as $row) {
            $arr[$row['id']] = $row['name'];
        }
        return $arr;
    }
}
