<?php
use Migrations\AbstractMigration;

class DropTableGestionnaire extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->table('gestionnaire')->drop()->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $users = $this->table('users', ['id' => false, 'primary_key' => ['numGestionnaire']]);
        $users->addColumn('numGestionnaire', 'integer', ['null' => false])
            ->addColumn('pseudoGestionnaire', 'string', ['limit' => 50])
            ->addColumn('mdpGestionnaire', 'string', ['limit' => 50])
            ->addColumn('telGestionnaire', 'string', ['limit' => 10])
            ->addColumn('emailGestionnaire', 'string', ['limit' => 150])
            ->addColumn('nomGestionnaire', 'string', ['limit' => 50])
            ->addColumn('prenomGestionnaire', 'string', ['limit' => 50])
            ->save();
    }
}
