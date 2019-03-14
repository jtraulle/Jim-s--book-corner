<?php
use Migrations\AbstractMigration;

class RenameColumnNumEmprunteurFromUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('users');
        $table->renameColumn('numEmprunteur', 'id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('users');
        $table->renameColumn('id', 'numEmprunteur')->update();
    }
}
