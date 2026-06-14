<?php

namespace backend\modules\licman\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\licman\models\LicApp;

/**
 * LicAppSearch represents the model behind the search form of `backend\modules\licman\models\LicApp`.
 */
class LicAppSearch extends LicApp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'release_date', 'status', 'org_relId', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'version', 'params_string_json', 'params_array_serialized', 'enc_key', 'data'], 'safe'],
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
        $query = LicApp::find();

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
            'release_date' => $this->release_date,
            'status' => $this->status,
            'org_relId' => $this->org_relId,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'version', $this->version])
            ->andFilterWhere(['like', 'params_string_json', $this->params_string_json])
            ->andFilterWhere(['like', 'params_array_serialized', $this->params_array_serialized])
            ->andFilterWhere(['like', 'enc_key', $this->enc_key])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
