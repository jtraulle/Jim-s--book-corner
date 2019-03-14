<?php
use Migrations\AbstractMigration;

class AlterColumnPasswordFromUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('users');
        $table->changeColumn('password', 'string', ['limit' => 255]);
        $table->update();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('users');
        $table->changeColumn('password', 'string', ['limit' => 50]);
        $table->update();
    }
}
