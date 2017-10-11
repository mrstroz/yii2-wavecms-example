<?php

namespace mrstroz\wavecms\example\controllers;

use mrstroz\wavecms\components\web\Controller;
use mrstroz\wavecms\example\models\ExamplePage;

class PageController extends Controller
{

    public function init()
    {
        $this->heading = 'Page type';
        $this->query = ExamplePage::find();

        parent::init();
    }

}