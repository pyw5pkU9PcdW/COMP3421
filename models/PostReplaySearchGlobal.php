<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PostReplay;

/**
 * PostReplaySearch represents the model behind the search form about `app\models\PostReplay`.
 */
class PostReplaySearchGlobal extends PostReplay
{

    public $globalSearch;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Post_id', 'Participant_id'], 'integer'],
            [['globalSearch', 'content', 'datetime'], 'safe'],
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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $query->asArray()->all();
        }

        $query->orFilterWhere(['like', 'content', $this->globalSearch])
            ->orFilterWhere(['like', 'datetime', $this->globalSearch]);

        $raw = $query->asArray()->all();

        $returnArr = [];

        foreach($raw as $row) {
            $detail = substr($row['content'], 0, 200).'...';
            $arrayRow =
                [
                    'type'=>'post',
                    'id'=>$row['Post_id'],
                    'title'=>'Reply - '.Post::getPostTileByPostId($row['Post_id']),
                    'detail'=>$detail,
                ];
            array_push($returnArr, $arrayRow);
        }


        return $returnArr;
    }
}
