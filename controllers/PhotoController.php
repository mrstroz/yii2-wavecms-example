<?php

namespace mrstroz\wavecms\example\controllers;

use mrstroz\wavecms\components\grid\ActionColumn;
use mrstroz\wavecms\components\grid\PublishColumn;
use mrstroz\wavecms\components\grid\SortColumn;
use mrstroz\wavecms\components\helpers\NavHelper;
use mrstroz\wavecms\components\web\Controller;
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

//        NavHelper::$active[] = 'example/item/index';

        parent::init();
    }

}