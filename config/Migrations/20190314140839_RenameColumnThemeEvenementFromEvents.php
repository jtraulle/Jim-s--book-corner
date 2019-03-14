<?php
use Migrations\AbstractMigration;

class RenameColumnThemeEvenementFromEvents extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('events');
        $table->renameColumn('themeEvenement', 'subject')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('events');
        $table->renameColumn('subject', 'themeEvenement')->update();
    }
}
