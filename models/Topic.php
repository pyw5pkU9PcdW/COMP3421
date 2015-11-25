<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Topic".
 *
 * @property integer $id
 * @property string $name
 * @property string $decription
 * @property integer $Category_id
 *
 * @property Activity[] $activities
 * @property Paper[] $papers
 * @property Post[] $posts
 * @property Category $category
 */
class Topic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Topic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'decription', 'Category_id'], 'required'],
            [['Category_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['decription'], 'string', 'max' => 256]
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
            'decription' => 'Decription',
            'Category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['Topic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPapers()
    {
        return $this->hasMany(Paper::className(), ['Topic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['Topic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'Category_id']);
    }

    /**
     * @return array
     */
    public function getTopicOptions() {
        $raw = Topic::find()->orderBy('Category_id')->all();
        $arr = array();
        foreach($raw as $row) {
            $categpry = \app\models\Category::getCategoryById($row['Category_id']);
            $arr[$row['id']] = $categpry.' - '.$row['name'];
        }
        return $arr;
    }
}
