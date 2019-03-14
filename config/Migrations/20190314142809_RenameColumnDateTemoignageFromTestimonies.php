<?php
use Migrations\AbstractMigration;

class RenameColumnDateTemoignageFromTestimonies extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('testimonies');
        $table->renameColumn('dateTemoignage', 'date')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('testimonies');
        $table->renameColumn('date', 'dateTemoignage')->update();
    }
}
