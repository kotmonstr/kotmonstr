<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Reqvizit;

/**
 * ReqvizitSearch represents the model behind the search form about `common\models\Reqvizit`.
 */
class ReqvizitSearch extends Reqvizit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'zip_code'], 'integer'],
            [['company_name', 'country', 'address', 'mobile', 'fax', 'email', 'schet', 'inn'], 'safe'],
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
        $query = Reqvizit::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'zip_code' => $this->zip_code,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'schet', $this->schet])
            ->andFilterWhere(['like', 'inn', $this->inn]);

        return $dataProvider;
    }
}
