<?php

namespace mrstroz\wavecms\example\models;

use himiklab\sortablegrid\SortableGridBehavior;
use mrstroz\wavecms\base\behaviors\ImageBehavior;
use mrstroz\wavecms\base\db\ActiveRecord;

/**
 * This is the model class for table "example_photo".
 *
 * @property string $id
 * @property integer $parent_id
 * @property integer $publish
 * @property integer $sort
 * @property string $name
 * @property string $image
 */
class ExamplePhoto extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'example_photo';
    }

    public function behaviors()
    {
        return [
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'sort'
            ],
            [
                'class' => ImageBehavior::className(),
                'attribute' => 'image',
                'folder' => 'images',
                'sizes' => [
                    [200, null],
                    [100, 100]
                ]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publish', 'sort'], 'integer'],
            [['name', 'image', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'publish' => 'Publish',
            'sort' => 'Sort',
            'name' => 'Name',
            'image' => 'Image',
            'type' => 'Type',
        ];
    }
}
