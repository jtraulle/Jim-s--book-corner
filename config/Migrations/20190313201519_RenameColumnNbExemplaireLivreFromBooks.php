<?php
use Migrations\AbstractMigration;

class RenameColumnNbExemplaireLivreFromBooks extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books');
        $table->renameColumn('nbExemplaireLivre', 'qty')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books');
        $table->renameColumn('qty', 'nbExemplaireLivre')->update();
    }
}
