<?php
use Migrations\AbstractMigration;

class RenameColumnResumeLivreFromBooks extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books');
        $table->renameColumn('resumeLivre', 'summary')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books');
        $table->renameColumn('summary', 'resumeLivre')->update();
    }
}
