<?php
use Migrations\AbstractMigration;

class RenameColumnNumEmprunteurFromTestimonies extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('testimonies');
        $table->renameColumn('numEmprunteur', 'user_id')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('testimonies');
        $table->renameColumn('user_id', 'numEmprunteur')->update();
    }
}
