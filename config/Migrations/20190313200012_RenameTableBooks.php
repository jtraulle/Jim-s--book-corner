<?php
use Migrations\AbstractMigration;

class RenameTableBooks extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('livre');
        $table->rename('books')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books');
        $table->rename('livre')->update();
    }
}
