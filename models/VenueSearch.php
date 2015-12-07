<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venue;

/**
 * VenueSearch represents the model behind the search form about `app\models\Venue`.
 */
class VenueSearch extends Venue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',], 'integer'],
            [['name', 'location', 'map', 'floorPlan', 'VenueType_id'], 'safe'],
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
        $query = Venue::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('venueType');

        $query->andFilterWhere([
            'id' => $this->id,
            //'VenueType_id' => $this->VenueType_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'map', $this->map])
            ->andFilterWhere(['like', 'floorPlan', $this->floorPlan])
            ->andFilterWhere(['like', 'venueType.name', $this->VenueType_id]);

        return $dataProvider;
    }
}
