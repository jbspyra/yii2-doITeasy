<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Locations;

/**
 * LocationsSearch represents the model behind the search form of `backend\models\Locations`.
 */
class LocationsSearch extends Locations
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location_id'], 'integer'],
            [['zipp_code', 'city', 'province'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Locations::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'location_id' => $this->location_id,
        ]);

        $query->andFilterWhere(['ilike', 'zipp_code', $this->zipp_code])
            ->andFilterWhere(['ilike', 'city', $this->city])
            ->andFilterWhere(['ilike', 'province', $this->province]);

        return $dataProvider;
    }
}
