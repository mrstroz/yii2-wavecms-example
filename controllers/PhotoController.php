<?php

namespace mrstroz\wavecms\example\controllers;

use mrstroz\wavecms\base\grid\ActionColumn;
use mrstroz\wavecms\base\grid\PublishColumn;
use mrstroz\wavecms\base\grid\SortColumn;
use mrstroz\wavecms\base\helpers\NavHelper;
use mrstroz\wavecms\base\web\Controller;
use mrstroz\wavecms\example\models\ExamplePhoto;

class PhotoController extends Controller
{

    public function init()
    {
        $this->heading = 'Photos';
        $this->query = ExamplePhoto::find()->andWhere(['type' => 'list']);

        $this->sort = true;

        $this->columns = array(
            'name',
            [
                'class' => SortColumn::className()
            ],
            [
                'class' => PublishColumn::className()
            ],
            [
                'class' => ActionColumn::className(),
            ]
        );

        NavHelper::$active[] = 'example/item/index';

        parent::init();
    }

}