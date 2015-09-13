<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;

/**
 * Application represents the model behind the search form about `app\models\Application`.
 */
class ApplicationSearch extends Application
{
    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }

    /**
     * Returns a list of scenarios and the corresponding active attributes.
     *
     * @return array
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array   $params
     * @param integer $group_id  The number of application group.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $group_id)
    {
        $query = Application::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        if (!($this->load($params) && $this->validate()) && $group_id === null) {
            return $dataProvider;
        }
        
        if($group_id !== null)
            $query->andFilterWhere([
                'group_id' => $group_id,
            ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
