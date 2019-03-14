<?php
use Migrations\AbstractMigration;

class RenameTableEvents extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('evenement');
        $table->rename('events')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('events');
        $table->rename('evenement')->update();
    }
}
