<?php
use Migrations\AbstractMigration;

class RenameColumnPrenomEmprunteurFromUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('users');
        $table->renameColumn('prenomEmprunteur', 'first_name')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('users');
        $table->renameColumn('first_name', 'prenomEmprunteur')->update();
    }
}
