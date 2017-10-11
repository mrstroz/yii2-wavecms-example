<?php

namespace mrstroz\wavecms\example\models;

use mrstroz\wavecms\components\behaviors\SubListBehavior;
use yii\db\ActiveRecord;

class ExamplePage extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'example_page';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SubListBehavior::className(),
                'listId' => 'photos',
                'route' => '/example/photo-page/sub-list',
                'parentField' => 'parent_id'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
            [['title'], 'required'],
            [['text'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }
}
