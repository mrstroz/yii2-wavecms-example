<?php

namespace mrstroz\wavecms\example\models;

use mrstroz\wavecms\base\base\CheckboxListBehavior;

/**
 * This is the model class for table "example_item".
 *
 * @property string $id
 * @property integer $publish
 * @property string $title
 * @property string $textarea
 * @property string $ckeditor
 * @property string $category_id
 * @property string $dropdown
 * @property string $checkbox
 * @property string $checkbox_list
 * @property string $date_picker
 */
class ExampleItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'example_item';
    }

    public function behaviors()
    {
        return [
            [
                'class' => CheckboxListBehavior::className(),
                'fields' => ['checkbox_list']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publish', 'category_id', 'checkbox'], 'integer'],
            [['textarea', 'ckeditor'], 'string'],
            [['checkbox_list', 'date_picker'], 'safe'],
            [['title', 'dropdown'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'textarea' => 'Textarea',
            'ckeditor' => 'Ckeditor',
            'category_id' => 'Category ID',
            'dropdown' => 'Dropdown',
            'checkbox' => 'Checkbox',
            'checkbox_list' => 'Checkbox List',
            'date_picker' => 'Date Picker',
        ];
    }

    public function setCheckbox_list($checkbox_list)
    {
        return 'TEST';
    }
}
