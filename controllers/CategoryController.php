<?php

namespace mrstroz\wavecms\example\controllers;

use mrstroz\wavecms\components\grid\ActionColumn;
use mrstroz\wavecms\components\grid\CheckboxColumn;
use mrstroz\wavecms\components\grid\PublishColumn;
use mrstroz\wavecms\components\grid\SortColumn;
use mrstroz\wavecms\components\web\Controller;
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
            [
                'class' => CheckboxColumn::class,
            ],
            'name',
            [
                'class' => SortColumn::class,
            ],
            [
                'class' => PublishColumn::class
            ],
            [
                'class' => ActionColumn::className(),
            ]
        );

        parent::init();
    }


}