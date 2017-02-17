<?php

use yii\db\Migration;

class m170217_072305_seance extends Migration
{
    public function up()
    {
        $this->createTable('seance', [
            'id' => 'int(11) unsigned NOT NULL',
            'hall_id' => 'INT(11) UNSIGNED NOT NULL',
            'movie_id' => 'INT(11) UNSIGNED NOT NULL',
            'start_time' => 'TIME NOT NULL',
            'PRIMARY KEY (`id`)',
            'UNIQUE KEY `hall_id` (`hall_id`,`movie_id`,`start_time`)'
        ]);

        $this->addForeignKey('FK_HALL', 'seance', 'hall_id', 'hall', 'id', 'CASCADE');
        $this->addForeignKey('FK_MOVIE', 'seance', 'movie_id', 'movie', 'id');
    }

    public function down()
    {
        echo "m170217_072305_seance cannot be reverted.\n";

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
