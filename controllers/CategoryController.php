<?php

namespace mrstroz\wavecms\example\controllers;

use mrstroz\wavecms\base\grid\ActionColumn;
use mrstroz\wavecms\base\grid\PublishColumn;
use mrstroz\wavecms\base\grid\SortColumn;
use mrstroz\wavecms\base\web\Controller;
use mrstroz\wavecms\example\models\ExampleCategory;
use yii\data\ActiveDataProvider;

class CategoryController extends Controller
{

    public function init()
    {
        $this->heading = 'Categories';
        $this->query = ExampleCategory::find();

        $this->dataProvider = new ActiveDataProvider([
            'query' => $this->query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        $this->sort = true;

        $this->columns = array(
            'name',
            [
                'class' => SortColumn::className(),
            ],
            [
                'class' => PublishColumn::className()
            ],
            [
                'class' => ActionColumn::className(),
            ]
        );

        parent::init();
    }


}