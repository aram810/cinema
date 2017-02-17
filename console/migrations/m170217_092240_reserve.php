<?php

use yii\db\Migration;

class m170217_092240_reserve extends Migration
{
    public function up()
    {
        $this->createTable('reserve', [
            'seance_id' => 'int(11) unsigned NOT NULL',
            'column' => 'int(2) unsigned NOT NULL',
            'row' => 'int(2) unsigned NOT NULL',
            'PRIMARY KEY (`seance_id`,`column`,`row`)'
        ]);

        $this->addForeignKey('reserve_ibfk_1', 'reserve', 'seance_id', 'seance', 'id');
    }

    public function down()
    {
        echo "m170217_092240_reserve cannot be reverted.\n";

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
