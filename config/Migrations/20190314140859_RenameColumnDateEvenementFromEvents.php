<?php
use Migrations\AbstractMigration;

class RenameColumnDateEvenementFromEvents extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('events');
        $table->renameColumn('dateEvenement', 'date')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('events');
        $table->renameColumn('date', 'dateEvenement')->update();
    }
}
