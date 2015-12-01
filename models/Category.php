<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property Topic[] $topics
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Category';
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
    public function getTopics()
    {
        return $this->hasMany(Topic::className(), ['Category_id' => 'id']);
    }

    /**
     * @return array
     */
    public function getCategoryOptions() {
        $raw = Category::find()->asArray()->all();
        $arr = array();
        foreach($raw as $row) {
            $arr[$row['id']] = $row['name'];
        }
        return $arr;
    }

    public function getCategoryById($id) {
        $raw = Category::findOne($id);
        return $raw['name'];
    }
}
