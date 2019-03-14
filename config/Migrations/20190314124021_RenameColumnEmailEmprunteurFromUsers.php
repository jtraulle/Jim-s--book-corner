<?php
use Migrations\AbstractMigration;

class RenameColumnEmailEmprunteurFromUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('users');
        $table->renameColumn('emailEmprunteur', 'email')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('users');
        $table->renameColumn('email', 'emailEmprunteur')->update();
    }
}
