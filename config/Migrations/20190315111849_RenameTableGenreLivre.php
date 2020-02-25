<?php
use Migrations\AbstractMigration;

class RenameTableGenreLivre extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('genre_livre');
        $table->rename('books_genres')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books_genres');
        $table->rename('genre_livre')->update();
    }
}
