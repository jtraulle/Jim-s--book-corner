<?php
use Migrations\AbstractMigration;

class RenameColumnNomEvenementFromEvents extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('events');
        $table->renameColumn('nomEvenement', 'name')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('events');
        $table->renameColumn('name', 'nomEvenement')->update();
    }
}
