<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Announcement;

/**
 * AnnouncementSearch represents the model behind the search form about `app\models\Announcement`.
 */
class AnnouncementSearchGlobal extends Announcement
{

    public $globalSearch;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Administrator_id'], 'integer'],
            [['globalSearch', 'title', 'content', 'datetime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Announcement::find();

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $query->asArray()->all();
        }

        $query->orFilterWhere(['like', 'title', $this->globalSearch])
            ->orFilterWhere(['like', 'content', $this->globalSearch]);

        $raw = $query->asArray()->all();

        $returnArr = [];

        foreach($raw as $row) {
            $detail = substr($row['content'], 0, 200).'...';
            $arrayRow =
                [
                    'type'=>'announcement',
                    'id'=>$row['id'],
                    'title'=>$row['title'],
                    'detail'=>$detail,
                ];
            array_push($returnArr, $arrayRow);
        }

        return $returnArr;
    }
}
