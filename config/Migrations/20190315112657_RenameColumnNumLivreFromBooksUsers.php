<?php
use Migrations\AbstractMigration;

class RenameColumnNumLivreFromBooksUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books_users');
        $table->renameColumn('numLivre', 'book_id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books_users');
        $table->renameColumn('book_id', 'numLivre')->update();
    }
}
