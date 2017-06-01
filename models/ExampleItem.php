<?php

namespace mrstroz\wavecms\example\models;

use mrstroz\wavecms\base\behaviors\CheckboxListBehavior;
use mrstroz\wavecms\base\behaviors\ImageBehavior;
use mrstroz\wavecms\base\db\ActiveRecord;


/**
 * This is the model class for table "example_item".
 *
 * @property string $id
 * @property integer $publish
 * @property string $title
 * @property string $textarea
 * @property string $ckeditor
 * @property string $category_id
 * @property string $category_select_id
 * @property string $dropdown
 * @property string $checkbox
 * @property string $checkbox_list
 * @property string $date_picker
 * @property string image
 * @property string image_header
 */
class ExampleItem extends ActiveRecord
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
            ],
            [
                'class' => ImageBehavior::className(),
                'folderAbove' => true,
                'attribute' => 'image',
                'folder' => 'images',
                'sizes' => [
                    [200, null],
                    [100, 100]
                ]
            ],
            [
                'class' => ImageBehavior::className(),
                'folderAbove' => true,
                'attribute' => 'image_header',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publish', 'category_id', 'category_select_id', 'checkbox'], 'integer'],
            [['textarea', 'ckeditor'], 'string'],
            [['dropdown', 'checkbox_list', 'date_picker'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'required'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['image_header'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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
            'category_select_id' => 'Category Select2',
            'categoryName' => 'Category name',
            'dropdown' => 'Dropdown',
            'checkbox' => 'Checkbox',
            'checkbox_list' => 'Checkbox List',
            'date_picker' => 'Date Picker',
            'image' => 'Image',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(ExampleCategory::className(), ['id' => 'category_id']);
    }

    public function getCategoryName()
    {
        if ($this->category instanceof ExampleCategory) {
            return $this->category->name;
        }
    }
}
