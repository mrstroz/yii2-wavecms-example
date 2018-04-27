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


        if ($app->id === 'app-backend') {
            if (!Yii::$app->user->isGuest) {
                Yii::$app->language = Yii::$app->user->identity->lang;
            }
        }

        /** @var Module $module */
        if ($app->hasModule('wavecms') && ($module = $app->getModule('wavecms-example')) instanceof Module) {

            if ($app->id === 'app-backend') {

                $this->initNavigation();
            }
        }


    }

    /**
     * Init left navigation
     */
    protected function initNavigation()
    {
        Yii::$app->params['nav']['wavecms_example'] = [
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
                    'url' => ['/wavecms-example/item/index', 'test' => 1]
                ],
                [
                    'label' => FontAwesome::icon('tag') . 'Categories',
                    'url' => ['/wavecms-example/category/index']
                ],
                [
                    'label' => FontAwesome::icon('pencil-square-o') . 'Page',
                    'url' => ['/wavecms-example/page/page']
                ],
                [
                    'label' => FontAwesome::icon('cog') . 'Settings',
                    'url' => ['/wavecms-example/settings/settings']
                ]

            ]
        ];
    }
}