<?php
use Migrations\AbstractMigration;

class RenameTableGenre extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('genre');
        $table->rename('genres')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('genres');
        $table->rename('genre')->update();
    }
}
