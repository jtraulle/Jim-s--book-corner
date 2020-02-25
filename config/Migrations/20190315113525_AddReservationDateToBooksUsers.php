<?php
use Migrations\AbstractMigration;

class AddReservationDateToBooksUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('books_users');
        $table->addColumn('reservation_date', 'datetime', [
            'after' => 'book_id',
            'default' => null,
            'null' => true,
        ]);
        $table->update();
    }
}
