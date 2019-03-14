<?php
use Migrations\AbstractMigration;

class RenameColumnIdentifiantEmprunteurFromUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('users');
        $table->renameColumn('identifiantEmprunteur', 'username')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('users');
        $table->renameColumn('username', 'identifiantEmprunteur')->update();
    }
}
