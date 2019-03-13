<?php
use Migrations\AbstractMigration;

class RenameColumnNomAuteurFromAuthors extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('authors');
        $table->renameColumn('nomAuteur', 'last_name')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('authors');
        $table->renameColumn('last_name', 'nomAuteur')->update();
    }
}
