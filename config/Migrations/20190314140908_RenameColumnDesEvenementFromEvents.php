<?php
use Migrations\AbstractMigration;

class RenameColumnDesEvenementFromEvents extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('events');
        $table->renameColumn('desEvenement', 'description')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('events');
        $table->renameColumn('description', 'desEvenement')->update();
    }
}
