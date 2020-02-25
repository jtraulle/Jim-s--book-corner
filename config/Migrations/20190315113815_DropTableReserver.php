<?php
use Migrations\AbstractMigration;

class DropTableReserver extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->table('reserver')->drop()->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $users = $this->table('users', ['id' => false, 'primary_key' => ['numGestionnaire']]);
        $users->addColumn('numReservation', 'integer', ['null' => false])
            ->addColumn('numEmprunteur', 'integer', ['null' => false])
            ->addColumn('numLivre', 'integer', ['null' => false])
            ->addColumn('dateReservation', 'datetime')
            ->addColumn('retirereservation', 'boolean', ['default' => false])
            ->save();
    }
}
