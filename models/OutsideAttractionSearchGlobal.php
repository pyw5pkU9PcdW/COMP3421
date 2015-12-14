<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OutsideAttraction;

/**
 * OutsideAttractionSearch represents the model behind the search form about `app\models\OutsideAttraction`.
 */
class OutsideAttractionSearchGlobal extends OutsideAttraction
{

    public $globalSearch;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['globalSearch', 'Outside_Attraction_name', 'Outside_Attraction_description', 'Outside_Attraction_let', 'Outside_Attraction_lng', 'Outside_Attraction_image_file'], 'safe'],
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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $query->asArray()->all();
        }

        $query->orFilterWhere(['like', 'Outside_Attraction_name', $this->globalSearch])
            ->orFilterWhere(['like', 'Outside_Attraction_description', $this->globalSearch])
            ->orFilterWhere(['like', 'Outside_Attraction_let', $this->globalSearch])
            ->orFilterWhere(['like', 'Outside_Attraction_lng', $this->globalSearch]);

        $raw = $query->asArray()->all();

        $returnArr = [];

        foreach($raw as $row) {
            $detail = substr($row['Outside_Attraction_description'], 0, 200).'...';
            $arrayRow =
                [
                    'type'=>'outside-attraction',
                    'id'=>$row['id'],
                    'title'=>$row['Outside_Attraction_name'],
                    'detail'=>$detail,
                ];
            array_push($returnArr, $arrayRow);
        }


        return $returnArr;
    }
}
