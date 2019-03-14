<?php
use Migrations\AbstractMigration;

class RenameColumnLieuEvenementFromEvents extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('events');
        $table->renameColumn('lieuEvenement', 'location')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('events');
        $table->renameColumn('location', 'lieuEvenement')->update();
    }
}
