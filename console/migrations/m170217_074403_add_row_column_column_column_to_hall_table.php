<?php

use yii\db\Migration;

/**
 * Handles adding row_column_column to table `hall`.
 */
class m170217_074403_add_row_column_column_column_to_hall_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('hall', 'row', 'INT(2) UNSIGNED NOT NULL AFTER `name`');
        $this->addColumn('hall', 'column', 'INT(2) UNSIGNED NOT NULL AFTER `row`');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
