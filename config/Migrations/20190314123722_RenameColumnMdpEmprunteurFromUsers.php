<?php
use Migrations\AbstractMigration;

class RenameColumnMdpEmprunteurFromUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('users');
        $table->renameColumn('mdpEmprunteur', 'password')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('users');
        $table->renameColumn('password', 'mdpEmprunteur')->update();
    }
}
