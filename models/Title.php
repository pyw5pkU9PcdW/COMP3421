<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Title".
 *
 * @property integer $id
 * @property string $name
 */
class Title extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 10]
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

    public function getTitleOptions() {
        $raw = Title::find()->all();
        $arr = array();
        foreach($raw as $row) {
            $arr[$row['id']] = $row['name'];
        }
        return $arr;
    }

    public function getTitleById($id) {
        $raw = Title::findOne($id);
        return $raw['name'];
    }
}
