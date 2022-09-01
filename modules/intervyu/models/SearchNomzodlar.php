<?php

namespace app\modules\intervyu\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\intervyu\models\Nomzodlar;

/**
 * SearchNomzodlar represents the model behind the search form of `app\modules\intervyu\models\Nomzodlar`.
 */
class SearchNomzodlar extends Nomzodlar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'age', 'hired', 'status', 'dateTimeInterview', 'created_at', 'updated_at'], 'integer'],
            [['name', 'familyName', 'address', 'countryOfOrigin', 'emailAddress', 'phoneNumber', 'note'], 'safe'],
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
        $query = Nomzodlar::find();

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
            'id' => $this->id,
            'age' => $this->age,
            'hired' => $this->hired,
            'status' => $this->status,
            'dateTimeInterview' => $this->dateTimeInterview,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'familyName', $this->familyName])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'countryOfOrigin', $this->countryOfOrigin])
            ->andFilterWhere(['like', 'emailAddress', $this->emailAddress])
            ->andFilterWhere(['like', 'phoneNumber', $this->phoneNumber])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
