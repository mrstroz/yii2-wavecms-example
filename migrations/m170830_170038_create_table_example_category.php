<?php

use yii\db\Migration;

class m170830_170038_create_table_example_category extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%example_category}}', [
            'id' => $this->bigInteger(20)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'publish' => $this->smallInteger(1),
            'sort' => $this->bigInteger(20),
            'name' => $this->string(255),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%example_category}}');
    }
}
