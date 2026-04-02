<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SocialProgram;

/**
 * SocialProgramSearch represents the model behind the search form of `common\models\SocialProgram`.
 */
class SocialProgramSearch extends SocialProgram
{
    public function rules()
    {
        return [
            [['id', 'type_id', 'status', 'is_featured', 'created_at', 'updated_at'], 'integer'],
            [['title', 'slug', 'summary', 'content', 'image'], 'safe'],
            [['target_amount', 'current_amount'], 'number'],
        ];
    }

    public function search($params)
    {
        $query = SocialProgram::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type_id' => $this->type_id,
            'target_amount' => $this->target_amount,
            'current_amount' => $this->current_amount,
            'status' => $this->status,
            'is_featured' => $this->is_featured,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
