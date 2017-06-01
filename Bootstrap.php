<?php

namespace mrstroz\wavecms\example;

use mrstroz\wavecms\base\helpers\FontAwesome;
use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        Yii::setAlias('@wavecmsbase', '@vendor/mrstroz/yii2-wavecms-base');

        Yii::$app->params['nav'][] = [
            'label' => FontAwesome::icon('book') . 'Example module',
            'url' => 'javascript: ;',
            'position' => 90,
            'items' => [
                [
                    'label' => FontAwesome::icon('list') . 'Items',
                    'url' => ['/example/item/index']
                ],
                [
                    'label' => FontAwesome::icon('tag') . 'Categories',
                    'url' => ['/example/category/index']
                ],
                [
                    'label' => FontAwesome::icon('pencil-square-o') . 'Page',
                    'url' => ['/example/page/page']
                ],

            ]
        ];
    }
}