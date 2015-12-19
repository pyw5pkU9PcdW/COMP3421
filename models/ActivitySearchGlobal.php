<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form about `app\models\Activity`.
 */
class ActivitySearchGlobal extends Activity
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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $query->asArray()->all();
        }

        $query->joinWith('venue');
        $query->joinWith('topic');
        $query->joinWith('activityType');

        $query->orFilterWhere(['like', 'Activity_name', $this->globalSearch])
            ->orFilterWhere(['like', 'startDatetime', $this->globalSearch])
            ->orFilterWhere(['like', 'endDatetime', $this->globalSearch])
            ->orFilterWhere(['like', 'Venue.name', $this->globalSearch])
            ->orFilterWhere(['like', 'Topic.name', $this->globalSearch])
            ->orFilterWhere(['like', 'ActivityType.ActivityType_name', $this->globalSearch]);

        $raw = $query->asArray()->all();

        $returnArr = [];

        foreach($raw as $row) {
            $detail = substr($row['description'], 0, 200).'...';
            $arrayRow =
                [
                    'type'=>'activity',
                    'id'=>$row['id'],
                    'title'=>$row['Activity_name'],
                    'detail'=>$detail,
                ];
            array_push($returnArr, $arrayRow);
        }


        return $returnArr;
    }
}
