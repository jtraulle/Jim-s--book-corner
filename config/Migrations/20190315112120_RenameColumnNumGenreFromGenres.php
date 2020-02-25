<?php
use Migrations\AbstractMigration;

class RenameColumnNumGenreFromGenres extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('genres');
        $table->renameColumn('numGenre', 'id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('genres');
        $table->renameColumn('id', 'numGenre')->update();
    }
}
