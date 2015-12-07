<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OutsideAttraction;

/**
 * OutsideAttractionSearch represents the model behind the search form about `app\models\OutsideAttraction`.
 */
class OutsideAttractionSearch extends OutsideAttraction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Outside_Attraction_name', 'Outside_Attraction_description', 'Outside_Attraction_let', 'Outside_Attraction_lng', 'Outside_Attraction_image_file'], 'safe'],
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
        $query = OutsideAttraction::find();

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
        ]);

        $query->andFilterWhere(['like', 'Outside_Attraction_name', $this->Outside_Attraction_name])
            ->andFilterWhere(['like', 'Outside_Attraction_description', $this->Outside_Attraction_description])
            ->andFilterWhere(['like', 'Outside_Attraction_let', $this->Outside_Attraction_let])
            ->andFilterWhere(['like', 'Outside_Attraction_lng', $this->Outside_Attraction_lng])
            ->andFilterWhere(['like', 'Outside_Attraction_image_file', $this->Outside_Attraction_image_file]);

        return $dataProvider;
    }
}
