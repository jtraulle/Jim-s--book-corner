<?php
use Migrations\AbstractMigration;

class RenameColumnNumLivreFromReviews extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('reviews');
        $table->renameColumn('numLivre', 'book_id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('reviews');
        $table->renameColumn('book_id', 'numLivre')->update();
    }
}
