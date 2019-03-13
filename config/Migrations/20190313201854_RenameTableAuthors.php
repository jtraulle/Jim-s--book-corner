<?php
use Migrations\AbstractMigration;

class RenameTableAuthors extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('auteur');
        $table->rename('authors')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('authors');
        $table->rename('auteur')->update();
    }
}
