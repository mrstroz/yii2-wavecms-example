<?php

namespace mrstroz\wavecms\example\models;

use himiklab\sortablegrid\SortableGridBehavior;
use mrstroz\wavecms\db\ActiveRecord;

/**
 * This is the model class for table "example_category".
 *
 * @property string $id
 * @property integer $publish
 * @property integer $sort
 * @property string $name
 */
class ExampleCategory extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'example_category';
    }

    public function behaviors()
    {
        return [
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'sort'
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
            [['name'], 'string', 'max' => 255],
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
        ];
    }
}
