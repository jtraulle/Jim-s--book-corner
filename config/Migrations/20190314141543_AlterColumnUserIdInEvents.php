<?php
use Migrations\AbstractMigration;

class AlterColumnUserIdInEvents extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->execute('UPDATE events SET user_id = 4 WHERE user_id = 2;');
        $this->execute('UPDATE events SET user_id = 20 WHERE user_id = 3;');
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('UPDATE events SET user_id = 2 WHERE user_id = 4;');
        $this->execute('UPDATE events SET user_id = 3 WHERE user_id = 20;');
    }
}
