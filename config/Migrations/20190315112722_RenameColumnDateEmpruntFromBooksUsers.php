<?php
use Migrations\AbstractMigration;

class RenameColumnDateEmpruntFromBooksUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books_users');
        $table->renameColumn('dateEmprunt', 'borrow_date')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books_users');
        $table->renameColumn('borrow_date', 'dateEmprunt')->update();
    }
}
