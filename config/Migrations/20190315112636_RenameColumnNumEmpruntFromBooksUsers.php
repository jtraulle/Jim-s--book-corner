<?php
use Migrations\AbstractMigration;

class RenameColumnNumEmpruntFromBooksUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books_users');
        $table->renameColumn('numEmprunt', 'id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books_users');
        $table->renameColumn('id', 'numEmprunt')->update();
    }
}
