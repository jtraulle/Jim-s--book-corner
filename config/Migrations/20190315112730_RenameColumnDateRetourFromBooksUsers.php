<?php
use Migrations\AbstractMigration;

class RenameColumnDateRetourFromBooksUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books_users');
        $table->renameColumn('dateRetour', 'return_date')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books_users');
        $table->renameColumn('return_date', 'dateRetour')->update();
    }
}
