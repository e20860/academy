<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Graduates;

/**
 * GraduatesSearch represents the model behind the search form of `app\models\Graduates`.
 */
class GraduatesSearch extends Graduates
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'units_id', 'rip', 'locals_id'], 'integer'],
            [['fam', 'nam', 'sur', 'photo1', 'photo2', 'info'], 'safe'],
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
        $query = Graduates::find()->joinWith('unit','local');

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
            'units_id' => $this->units_id,
            'rip' => $this->rip,
        ]);

        $query->andFilterWhere(['like', 'fam', $this->fam])
            ->andFilterWhere(['like', 'nam', $this->nam])
            ->andFilterWhere(['like', 'sur', $this->sur])
            ->andFilterWhere(['like', 'photo1', $this->photo1])
            ->andFilterWhere(['like', 'photo2', $this->photo2])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'local.town', $this->locals_id]);

        return $dataProvider;
    }
}
