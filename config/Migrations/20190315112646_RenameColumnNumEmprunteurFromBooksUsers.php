<?php
use Migrations\AbstractMigration;

class RenameColumnNumEmprunteurFromBooksUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books_users');
        $table->renameColumn('numEmprunteur', 'user_id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books_users');
        $table->renameColumn('user_id', 'numEmprunteur')->update();
    }
}
