<?php
use Migrations\AbstractMigration;

class RenameTableUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('emprunteur');
        $table->rename('users')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('users');
        $table->rename('emprunteur')->update();
    }
}
