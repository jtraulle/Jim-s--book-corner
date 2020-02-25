<?php
use Migrations\AbstractMigration;

class RenameColumnNumGenreFromBooksGenres extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books_genres');
        $table->renameColumn('numGenre', 'genre_id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books_genres');
        $table->renameColumn('genre_id', 'numGenres')->update();
    }
}
