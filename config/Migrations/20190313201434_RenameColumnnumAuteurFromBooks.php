<?php
use Migrations\AbstractMigration;

class RenameColumnnumAuteurFromBooks extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books');
        $table->renameColumn('numAuteur', 'author_id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books');
        $table->renameColumn('author_id', 'numAuteur')->update();
    }
}
