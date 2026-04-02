<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SocialProgramType;

/**
 * SocialProgramTypeSearch represents the model behind the search form of `common\models\SocialProgramType`.
 */
class SocialProgramTypeSearch extends SocialProgramType
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'description', 'icon'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = SocialProgramType::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'icon', $this->icon]);

        return $dataProvider;
    }
}
