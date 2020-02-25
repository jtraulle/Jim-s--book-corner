<?php
use Migrations\AbstractMigration;

class RenameTableEmprunter extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('emprunter');
        $table->rename('books_users')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books_users');
        $table->rename('emprunter')->update();
    }
}
