<?php

namespace mrstroz\wavecms\example\controllers;

use mrstroz\wavecms\base\grid\ActionColumn;
use mrstroz\wavecms\base\grid\PublishColumn;
use mrstroz\wavecms\base\web\Controller;
use mrstroz\wavecms\example\models\ExamplePhoto;

class PhotoPageController extends Controller
{

    public function init()
    {
        $this->heading = 'Photos';
        $this->query = ExamplePhoto::find()->andWhere(['type' => 'page']);

        $this->sort = true;



        $this->columns = array(
            'name',
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