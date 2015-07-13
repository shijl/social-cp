<?php

namespace app\module\register\model;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\module\register\model\Register;

/**
 * Abc10Search represents the model behind the search form about `app\models\Abc10`.
 */
class RegisterSearch extends Register
{
	public function rules()
	{
		return [
			[['company_name','leader','project_name'],'string'],
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
        $query = Register::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'company_name' => $this->company_name,
            'leader' => $this->leader,
            'project_name' => $this->project_name,
        ]);

        // $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
