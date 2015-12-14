<?php
/**
 * Created by PhpStorm.
 * User: patrina
 * Date: 2/12/15
 * Time: 5:26 PM
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

class ActivitySearch extends Activity{


    public $globalSearch;

    public function rules(){
        return[
            [['id'], 'integer'],
            //[['name', 'description','globalSearch', 'documentLink', 'personInCharge', 'lastModifyTime', 'startDatetime', 'endDatetime', 'Venue_id', 'Topic_id', 'ActivityType_id', 'Administrator_id'], 'safe'],
            [['venue', 'topic', 'activityType', 'personInCharge'], 'safe'],
        ];
    }

    public function scenarios(){
        return Model::scenarios();
    }

    public function search($params){
        $query = Activity::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if(!($this ->load($params) && $this ->validate())){
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this ->id,
            //'Venue_id' => $this -> Venue_id,
            //'ActivityType_id' => $this -> ActivityType_id

        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere('like', 'description', $this->description);

        return $dataProvider;
    }


}