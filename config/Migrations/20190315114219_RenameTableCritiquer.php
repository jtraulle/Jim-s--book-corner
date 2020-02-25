<?php
use Migrations\AbstractMigration;

class RenameTableCritiquer extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('critiquer');
        $table->rename('reviews')->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('reviews');
        $table->rename('critiquer')->update();
    }
}
