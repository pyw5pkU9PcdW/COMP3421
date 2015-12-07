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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'personInCharge', 'Administrator_id'], 'integer'],
            [['name', 'description', 'Venue_id', 'Topic_id', 'ActivityType_id', 'documentLink', 'lastModifyTime', 'startDatetime', 'endDatetime'], 'safe'],
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

<<<<<<< Updated upstream
        $query->joinWith('venue');
        $query->joinWith('topic');
        $query->joinWith('activityType');
=======
        $query->andFilterWhere([
            //'id' => $this ->id,
            //'Venue_id' => $this -> Venue_id,
            //'ActivityType_id' => $this -> ActivityType_id
>>>>>>> Stashed changes

        $query->andFilterWhere([
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

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'documentLink', $this->documentLink])
            ->andFilterWhere(['like', 'venue.name', $this->Venue_id])
            ->andFilterWhere(['like', 'topic.name', $this->Topic_id])
            ->andFilterWhere(['like', 'activityType.activityName', $this->ActivityType_id]);

        return $dataProvider;
    }
}
