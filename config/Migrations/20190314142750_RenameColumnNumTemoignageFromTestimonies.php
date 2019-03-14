<?php
use Migrations\AbstractMigration;

class RenameColumnNumTemoignageFromTestimonies extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('testimonies');
        $table->renameColumn('numTemoignage', 'id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('testimonies');
        $table->renameColumn('id', 'numTemoignage')->update();
    }
}
