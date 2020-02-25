<?php
use Migrations\AbstractMigration;

class RenameColumnNbRappelsFromBooksUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books_users');
        $table->renameColumn('nbRappels', 'reminder_no')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books_users');
        $table->renameColumn('reminder_no', 'nbRappels')->update();
    }
}
