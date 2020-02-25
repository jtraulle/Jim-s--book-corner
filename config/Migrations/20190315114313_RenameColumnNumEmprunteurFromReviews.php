<?php
use Migrations\AbstractMigration;

class RenameColumnNumEmprunteurFromReviews extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('reviews');
        $table->renameColumn('numEmprunteur', 'id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('reviews');
        $table->renameColumn('id', 'numEmprunteur')->update();
    }
}
