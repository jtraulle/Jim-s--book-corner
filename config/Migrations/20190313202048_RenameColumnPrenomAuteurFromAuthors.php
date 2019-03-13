<?php
use Migrations\AbstractMigration;

class RenameColumnPrenomAuteurFromAuthors extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('authors');
        $table->renameColumn('prenomAuteur', 'first_name')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('authors');
        $table->renameColumn('first_name', 'prenomAuteur')->update();
    }
}
