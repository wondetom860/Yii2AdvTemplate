<?php

namespace backend\modules\licman\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\licman\models\LicActivation;

/**
 * LicActivationSearch represents the model behind the search form of `backend\modules\licman\models\LicActivation`.
 */
class LicActivationSearch extends LicActivation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lic_app_relId', 'activation_date', 'active_duration', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['activation_code', 'dec_key', 'data'], 'safe'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = LicActivation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'lic_app_relId' => $this->lic_app_relId,
            'activation_date' => $this->activation_date,
            'active_duration' => $this->active_duration,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'activation_code', $this->activation_code])
            ->andFilterWhere(['like', 'dec_key', $this->dec_key])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
