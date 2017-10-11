<?php

namespace mrstroz\wavecms\example;

use mrstroz\wavecms\components\helpers\FontAwesome;
use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        Yii::setAlias('@wavecms_example', '@vendor/mrstroz/yii2-wavecms-example');

        Yii::$app->params['nav'][] = [
            'label' => FontAwesome::icon('book') . 'Example module',
            'url' => 'javascript: ;',
            'options' => [
                'class' => 'drop-down'
            ],
            'position' => 8000,
            'permission' => 'example',
            'items' => [
                [
                    'label' => FontAwesome::icon('list') . 'Items',
                    'url' => ['/example/item/index', 'test' => 1]
                ],
                [
                    'label' => FontAwesome::icon('list') . 'Items',
                    'url' => ['/example/item/index', 'test' => 2]
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