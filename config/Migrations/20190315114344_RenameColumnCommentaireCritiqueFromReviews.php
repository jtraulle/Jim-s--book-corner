<?php
use Migrations\AbstractMigration;

class RenameColumnCommentaireCritiqueFromReviews extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('reviews');
        $table->renameColumn('commentaireCritique', 'review')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('reviews');
        $table->renameColumn('review', 'commentaireCritique')->update();
    }
}
