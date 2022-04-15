<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BlogNews;

/**
 * BlogNewsSearch represents the model behind the search form of `common\models\BlogNews`.
 */
class BlogNewsSearch extends BlogNews
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'views', 'status', 'blog_category_id'], 'integer'],
            [['img', 'date', 'created_at', 'updated_at'], 'safe'],
            [['theme','content','button_label','description'], 'string'],
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
        $query = BlogNews::find();

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
            'views' => $this->views,
            'status' => $this->status,
            'blog_category_id' => $this->blog_category_id,
        ]);
        $query->joinWith('translations');
        $query->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'theme', $this->theme])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
