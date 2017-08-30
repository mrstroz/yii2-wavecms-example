<?php

use yii\db\Migration;

class m170830_170156_create_table_example_page extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%example_page}}', [
            'id' => $this->bigInteger(20)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'title' => $this->string(255),
            'text' => $this->text(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%example_page}}');
    }
}
