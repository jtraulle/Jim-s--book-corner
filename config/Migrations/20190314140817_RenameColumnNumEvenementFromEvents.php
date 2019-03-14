<?php
use Migrations\AbstractMigration;

class RenameColumnNumEvenementFromEvents extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('events');
        $table->renameColumn('numEvenement', 'id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('events');
        $table->renameColumn('id', 'numEvenement')->update();
    }
}
