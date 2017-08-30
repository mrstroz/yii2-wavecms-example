<?php

use yii\db\Migration;

class m170830_170124_create_table_example_item extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%example_item}}', [
            'id' => $this->bigInteger(20)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'publish' => $this->smallInteger(1),
            'title' => $this->string(255),
            'textarea' => $this->text(),
            'category_id' => $this->bigInteger(20),
            'category_select_id' => $this->bigInteger(20),
            'dropdown' => $this->string(255),
            'checkbox' => $this->smallInteger(1),
            'checkbox_list' => $this->string(255),
            'date_picker' => $this->date(),
            'image' => $this->string(255),
            'image_header' => $this->string(255),
            'file' => $this->string(255),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%example_item}}');
    }
}
