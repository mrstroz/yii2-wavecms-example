<?php

use yii\db\Migration;

class m170830_170128_create_table_example_item_lang extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%example_item_lang}}', [
            'id' => $this->bigInteger(20)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'example_item_id' => $this->bigInteger(20),
            'language' => $this->string(10),
            'translation' => $this->string(255),
            'ckeditor' => $this->text(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%example_item_lang}}');
    }
}
