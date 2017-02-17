<?php

use yii\db\Migration;

class m170217_071225_hall extends Migration
{
    public function up()
    {
        $this->createTable('hall', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT',
            'name' => 'VARCHAR(32) NOT NULL',
            'PRIMARY KEY (`id`)',
        ]);
    }

    public function down()
    {
        echo "m170217_071225_hall cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
