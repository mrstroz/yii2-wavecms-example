<?php

namespace mrstroz\wavecms\example\models;

use mrstroz\wavecms\base\behaviors\CheckboxListBehavior;
use mrstroz\wavecms\base\behaviors\FileBehavior;
use mrstroz\wavecms\base\behaviors\ImageBehavior;
use mrstroz\wavecms\base\behaviors\SettingsBehavior;
use mrstroz\wavecms\base\behaviors\SubListBehavior;
use mrstroz\wavecms\base\behaviors\TranslateBehavior;
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
 * @property string file
 * @property string settings_title
 */
class ExampleItem extends ActiveRecord
{

    public $settings_title;

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
            'checkbox_list' => [
                'class' => CheckboxListBehavior::className(),
                'fields' => ['checkbox_list']
            ],
            'image' => [
                'class' => ImageBehavior::className(),
                'attribute' => 'image',
                'folder' => 'images',
                'sizes' => [
                    [200, null],
                    [100, 100]
                ]
            ],
            'image_header' => [
                'class' => ImageBehavior::className(),
                'attribute' => 'image_header',
            ],
            'file' => [
                'class' => FileBehavior::className(),
                'attribute' => 'file',
            ],
            'photos' => [
                'class' => SubListBehavior::className(),
                'listId' => 'photos',
                'route' => '/example/photo/sub-list',
                'parentField' => 'parent_id'
            ],
            'translate' => [
                'class' => TranslateBehavior::className(),
                'translationAttributes' => [
                    'translation', 'ckeditor'
                ]
            ],
            'settings' => [
                'class' => SettingsBehavior::className(),
                'settingsAttributes' => [
                    'settings_title'
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
            [['publish', 'category_id', 'category_select_id', 'checkbox'], 'integer'],
            [['textarea', 'ckeditor'], 'string'],
            [['dropdown', 'checkbox_list', 'date_picker'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['title', 'translation'], 'required'],
            [['image', 'image_header'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf'],
            [['settings_title'], 'required']
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
            'file' => 'File',
            'settings_title' => 'Settings title',
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

    public function getTranslations()
    {
        return $this->hasMany(ExampleItemLang::className(), ['example_item_id' => 'id']);
    }
}
