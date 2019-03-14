<?php
use Migrations\AbstractMigration;

class RenameColumnNumGestionnaireFromEvents extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('events');
        $table->renameColumn('numGestionnaire', 'user_id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('events');
        $table->renameColumn('user_id', 'numGestionnaire')->update();
    }
}
