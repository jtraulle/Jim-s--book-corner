<?php
use Migrations\AbstractMigration;

class RenameColumnLangueLivreFromBooks extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books');
        $table->renameColumn('langueLivre', 'language')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books');
        $table->renameColumn('language', 'langueLivre')->update();
    }
}
