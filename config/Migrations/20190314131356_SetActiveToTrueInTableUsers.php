<?php
use Migrations\AbstractMigration;

class SetActiveToTrueInTableUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->execute('UPDATE users SET active = 1;');
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('UPDATE users SET active = 0;');
    }
}
