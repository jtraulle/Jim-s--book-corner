<?php
use Migrations\AbstractMigration;

class RenameColumnTitreLivreFromBooks extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books');
        $table->renameColumn('titreLivre', 'title')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books');
        $table->renameColumn('title', 'titreLivre')->update();
    }
}
