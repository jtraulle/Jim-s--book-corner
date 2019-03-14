<?php
use Migrations\AbstractMigration;

class RenameColumnTemoignageFromTestimonies extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('testimonies');
        $table->renameColumn('temoignage', 'testimony')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('testimonies');
        $table->renameColumn('testimony', 'temoignage')->update();
    }
}
