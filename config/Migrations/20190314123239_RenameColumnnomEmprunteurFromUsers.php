<?php
use Migrations\AbstractMigration;

class RenameColumnnomEmprunteurFromUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('users');
        $table->renameColumn('nomEmprunteur', 'last_name')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('users');
        $table->renameColumn('last_name', 'nomEmprunteur')->update();
    }
}
