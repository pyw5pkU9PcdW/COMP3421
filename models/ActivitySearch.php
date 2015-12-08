<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form about `app\models\Activity`.
 */
class ActivitySearch extends Activity
{

    public $globalSearch;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'personInCharge', 'Administrator_id'], 'integer'],
            [['globalSearch', 'Activity_name', 'description', 'Venue_id', 'Topic_id', 'ActivityType_id', 'documentLink', 'lastModifyTime', 'startDatetime', 'endDatetime'], 'safe'],
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
        $query = Activity::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('venue');
        $query->joinWith('topic');
        $query->joinWith('activityType');
        //$query->andFilterWhere([
            //'id' => $this ->id,
            //'Venue_id' => $this -> Venue_id,
            //'ActivityType_id' => $this -> ActivityType_id

        /*$query->andFilterWhere([
            'id' => $this->id,
            'personInCharge' => $this->personInCharge,
            'lastModifyTime' => $this->lastModifyTime,
            'startDatetime' => $this->startDatetime,
            'endDatetime' => $this->endDatetime,
            //'Venue_id' => $this->Venue_id,
            //'Topic_id' => $this->Topic_id,
            //'ActivityType_id' => $this->ActivityType_id,
            'Administrator_id' => $this->Administrator_id,
        ]);

        $query->andFilterWhere(['like', 'Activity_name', $this->Activity_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'documentLink', $this->documentLink])
            ->andFilterWhere(['like', 'venue.name', $this->Venue_id])
            ->andFilterWhere(['like', 'topic.name', $this->Topic_id])
            ->andFilterWhere(['like', 'activityType.ActivityType_name', $this->ActivityType_id]);*/

        $query->orFilterWhere(['like', 'Activity_name', $this->globalSearch])
            ->orFilterWhere(['like', 'startDatetime', $this->globalSearch])
            ->orFilterWhere(['like', 'endDatetime', $this->globalSearch])
            ->orFilterWhere(['like', 'venue.name', $this->globalSearch])
            ->orFilterWhere(['like', 'topic.name', $this->globalSearch])
            ->orFilterWhere(['like', 'activityType.ActivityType_name', $this->globalSearch]);

        return $dataProvider;
    }
}
