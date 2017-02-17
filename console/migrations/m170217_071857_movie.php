<?php

use yii\db\Migration;

class m170217_071857_movie extends Migration
{
    public function up()
    {
        $this->createTable('movie', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT',
            'name' => 'VARCHAR(32) NOT NULL',
            'duration' => 'INT(3) UNSIGNED NOT NULL COMMENT "Duration in minutes"',
            'PRIMARY KEY (`id`)',
        ]);
    }

    public function down()
    {
        echo "m170217_071857_movie cannot be reverted.\n";

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
