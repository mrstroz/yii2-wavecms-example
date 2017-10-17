<?php

namespace mrstroz\wavecms\example\controllers;

use mrstroz\wavecms\components\web\Controller;
use mrstroz\wavecms\example\models\ExampleSettings;

class SettingsController extends Controller
{

    public function init()
    {
        $this->type = 'settings';
        $this->heading = 'Settings';
        $this->modelClass = ExampleSettings::className();

        parent::init();
    }

}