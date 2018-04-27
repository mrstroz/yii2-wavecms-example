<?php

namespace mrstroz\wavecms\example\controllers;

use mrstroz\wavecms\components\grid\ActionColumn;
use mrstroz\wavecms\components\grid\CheckboxColumn;
use mrstroz\wavecms\components\grid\PublishColumn;
use mrstroz\wavecms\components\web\Controller;
use mrstroz\wavecms\example\models\ExampleItem;
use mrstroz\wavecms\example\models\ExampleItemSearch;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;

class ItemController extends Controller
{

    public function init()
    {

        $this->forwardParams = ['test'];

        $this->heading = 'Items';
        $this->query = ExampleItem::find()->joinWith(['category']);

        $this->dataProvider = new ActiveDataProvider([
            'query' => $this->query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        $this->columns = array(
            [
                'class' => CheckboxColumn::class,
            ],
            'id',
            'title',
            'categoryName',
            [
                'class' => PublishColumn::className(),
            ],
            [
                'class' => ActionColumn::className(),
            ],
        );

        $this->filterModel = new ExampleItemSearch();


        $this->on(self::EVENT_BEFORE_MODEL_SAVE, function ($event) {
        });

        $this->on(self::EVENT_BEFORE_RENDER, function ($event) {
            $this->view->params['buttons_top'][] = Html::a('Extra button', ['/'], ['class' => 'btn btn-default']);
        });

        parent::init();
    }
}