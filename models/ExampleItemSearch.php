<?php

namespace mrstroz\wavecms\example\models;

use Yii;
use yii\data\ActiveDataProvider;

class ExampleItemSearch extends ExampleItem
{

    public $categoryName;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'categoryName'], 'safe'],
        ];
    }

    /**
     * @param $dataProvider ActiveDataProvider
     * @return mixed
     */
    public function search($dataProvider)
    {
        $params = Yii::$app->request->get();

        $dataProvider->sort->attributes['categoryName'] = [
            'asc' => ['example_category.name' => SORT_ASC],
            'desc' => ['example_category.name' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $dataProvider->query->andFilterWhere(['or',
            ['example_item.id' => $this->id],
            ['like', 'example_item.title', $this->title],
            ['like', 'example_category.name', $this->categoryName]
        ]);

        return $dataProvider;
    }


}
