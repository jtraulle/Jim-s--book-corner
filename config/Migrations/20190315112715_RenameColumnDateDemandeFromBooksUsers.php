<?php
use Migrations\AbstractMigration;

class RenameColumnDateDemandeFromBooksUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('books_users');
        $table->renameColumn('dateDemande', 'request_date')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('books_users');
        $table->renameColumn('request_date', 'dateDemande')->update();
    }
}
