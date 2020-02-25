<?php
use Migrations\AbstractMigration;

class RenameColumnNumLivreFromBooksGenres extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books_genres');
        $table->renameColumn('numLivre', 'book_id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books_genres');
        $table->renameColumn('book_id', 'numLivre')->update();
    }
}
