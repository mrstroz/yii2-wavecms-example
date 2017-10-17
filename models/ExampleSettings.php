<?php

namespace mrstroz\wavecms\example\models;

use yii\base\Model;


class ExampleSettings extends Model
{
    public $title;
    public $text;


    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'safe'],
        ];
    }

}
