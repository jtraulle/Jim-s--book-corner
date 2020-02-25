<?php
use Migrations\AbstractMigration;

class RenameColumnNoteCritiqueFromReviews extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('reviews');
        $table->renameColumn('noteCritique', 'rating')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('reviews');
        $table->renameColumn('rating', 'noteCritique')->update();
    }
}
