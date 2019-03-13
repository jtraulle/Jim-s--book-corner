<?php
use Migrations\AbstractMigration;

class RenameColumnNumAuteurFromAuthors extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('authors');
        $table->renameColumn('numAuteur', 'id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('authors');
        $table->renameColumn('id', 'numAuteur')->update();
    }
}
