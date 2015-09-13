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
            [['id', 'group_id', 'pic'], 'integer'],
            [['name', 'info'], 'string'],
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
     * @param integer $pageSize  The number of results to be displayed per page.
     * @param boolean $published Whether or not application have to be published.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $pageSize = false, $published = false)
    {
        $query = Application::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => [
                'pageSize' => $pageSize,
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
