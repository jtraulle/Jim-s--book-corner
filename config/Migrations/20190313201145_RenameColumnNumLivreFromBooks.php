<?php
use Migrations\AbstractMigration;

class RenameColumnNumLivreFromBooks extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books');
        $table->renameColumn('numLivre', 'id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books');
        $table->renameColumn('id', 'numLivre')->update();
    }
}
