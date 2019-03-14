<?php
use Migrations\AbstractMigration;

class RenameTableTestimonies extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('temoignage');
        $table->rename('testimonies')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('testimonies');
        $table->rename('temoignage')->update();
    }
}
