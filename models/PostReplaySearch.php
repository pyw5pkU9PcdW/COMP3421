<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PostReplay;

/**
 * PostReplaySearch represents the model behind the search form about `app\models\PostReplay`.
 */
class PostReplaySearch extends PostReplay
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Post_id', 'Participant_id'], 'integer'],
            [['content', 'datetime'], 'safe'],
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
        $query = PostReplay::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'Post_id' => $this->Post_id,
            'Participant_id' => $this->Participant_id,
            'datetime' => $this->datetime,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
