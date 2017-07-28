<?php

namespace mrstroz\wavecms\example\models;

use Yii;

/**
 * This is the model class for table "example_item_lang".
 *
 * @property string $id
 * @property string $example_item_id
 * @property string $language
 * @property string $translation
 */
class ExampleItemLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'example_item_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['example_item_id'], 'integer'],
            [['language'], 'string', 'max' => 10],
            [['translation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('wavecms/example/main', 'ID'),
            'example_item_id' => Yii::t('wavecms/example/main', 'Example Item ID'),
            'language' => Yii::t('wavecms/example/main', 'Language'),
            'translation' => Yii::t('wavecms/example/main', 'Translation'),
        ];
    }
}
