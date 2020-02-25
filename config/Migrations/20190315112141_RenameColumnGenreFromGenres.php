<?php
use Migrations\AbstractMigration;

class RenameColumnGenreFromGenres extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('genres');
        $table->renameColumn('genre', 'name')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('genres');
        $table->renameColumn('name', 'genres')->update();
    }
}
